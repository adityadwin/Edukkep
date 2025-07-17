function enableSubmit(buttonId) {
    const button = document.getElementById(buttonId);
    if (button) {
        button.disabled = false;
    }
}

var renderRecaptcha = function(elementId, buttonId) {
    const element = document.getElementById(elementId);
    if (element && element.innerHTML.trim() === '') {
        const siteKey = element.getAttribute('data-sitekey');
        if (siteKey) {
            grecaptcha.render(elementId, {
                'sitekey': siteKey,
                'callback': () => enableSubmit(buttonId)
            });
        }
    }
}

var onloadCallback = function() {
    renderRecaptcha('contact-recaptcha', 'contactSubmitBtn');
    renderRecaptcha('appointment-recaptcha', 'appointmentSubmitBtn');
    renderRecaptcha('enquiry-recaptcha', 'enquirySubmitBtn');
};

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('appointmentModal');
    const searchModal = document.getElementById('searchModal');
    const successModal = document.getElementById('successModal');
    const closeBtn = document.querySelector('.close');
    const closeSearchBtn = document.querySelector('.close-search');
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    let currentDate = new Date();
    let selectedDate = null;
    let selectedTime = null;

    function openModal() {
        modal.style.display = 'block';
        updateDateDisplay();
        
        setTimeout(() => {
            onloadCallback();
        }, 100);
    }
    
    function closeModal() {
        modal.style.display = 'none';
        resetAppointmentForm();
    }
    
    function closeSearchModal() {
        searchModal.style.display = 'none';
    }
    
    function closeSuccessModal() {
        successModal.style.display = 'none';
    }
    
    function showSuccessMessage(message) {
        document.getElementById('successMessage').textContent = message;
        successModal.style.display = 'block';
    }
    
    function resetAppointmentForm() {
        document.getElementById('appointment-form').style.display = 'none';
        document.querySelector('.appointment-selection').style.display = 'block';
        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.classList.remove('selected');
        });
        selectedDate = null;
        selectedTime = null;
    }
    
    function updateDateDisplay() {
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        document.getElementById('selectedDate').textContent = currentDate.toLocaleDateString('en-US', options);
    }
    
    window.openModal = openModal;
    window.closeSuccessModal = closeSuccessModal;
    
    if(closeBtn) closeBtn.addEventListener('click', closeModal);
    if(closeSearchBtn) closeSearchBtn.addEventListener('click', closeSearchModal);
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
        if (event.target === searchModal) {
            closeSearchModal();
        }
        if (event.target === successModal) {
            closeSuccessModal();
        }
    });
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            this.classList.add('active');
            document.getElementById(tabName + '-tab').classList.add('active');
        });
    });

    const prevDateBtn = document.getElementById('prevDate');
    if (prevDateBtn) {
        prevDateBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 1);
            updateDateDisplay();
        });
    }

    const nextDateBtn = document.getElementById('nextDate');
    if(nextDateBtn) {
        nextDateBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 1);
            updateDateDisplay();
        });
    }

    document.querySelectorAll('.time-slot').forEach(slot => {
        slot.addEventListener('click', function() {
            document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
            this.classList.add('selected');
            
            selectedDate = new Date(currentDate);
            selectedTime = this.textContent;
            
            const appointmentInfo = `Book Appointment on ${selectedDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })} at ${selectedTime}`;
            
            document.getElementById('appointmentInfo').textContent = appointmentInfo;
            document.querySelector('.appointment-selection').style.display = 'none';
            document.getElementById('appointment-form').style.display = 'block';
        });
    });
    
    const finalAppointmentForm = document.getElementById('finalAppointmentForm');
    if (finalAppointmentForm) {
        finalAppointmentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.submit-btn');

            closeModal();
            showSuccessMessage('Appointment berhasil dibuat!');
            this.reset();
            grecaptcha.reset();
            submitBtn.disabled = true;
        });
    }
    
    const enquiryForm = document.getElementById('enquiryForm');
    if(enquiryForm) {
        enquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.submit-btn');
            
            closeModal();
            showSuccessMessage('Enquiry berhasil dikirim!');
            this.reset();
            grecaptcha.reset();
            submitBtn.disabled = true;
        });
    }
    
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.submit-btn');
            
            showSuccessMessage('Pesan berhasil dikirim!');
            this.reset();
            grecaptcha.reset();
            submitBtn.disabled = true;
        });
    }
    
    const subscribeForm = document.getElementById('subscribeForm');
    if (subscribeForm) {
        subscribeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            fetch('/subscribe', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                body: JSON.stringify({ email: this.email.value })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage(data.message || 'Berhasil subscribe newsletter!');
                    this.reset();
                }
            })
            .catch(error => {
                showSuccessMessage('Berhasil subscribe newsletter!');
                this.reset();
            });
        });
    }
    
    function performSearch() {
        const query = document.getElementById('searchInput').value.trim();
        if (query.length < 2) {
            alert('Please enter at least 2 characters to search.');
            return;
        }
        
        fetch(`/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data.results);
            searchModal.style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    function displaySearchResults(results) {
        const resultsContainer = document.getElementById('searchResults');
        if (results.length === 0) {
            resultsContainer.innerHTML = '<p>No results found.</p>';
            return;
        }
        
        resultsContainer.innerHTML = results.map(result => `
            <div class="search-result">
                <img src="${result.image}" alt="${result.title}">
                <div class="search-result-content">
                    <h4>${result.title}</h4>
                    <p>${result.description}</p>
                    <a href="${result.url}">Read more</a>
                </div>
            </div>
        `).join('');
    }
    
    window.performSearch = performSearch;

    const searchInput = document.getElementById('searchInput');
    if(searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }

    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navCenter = document.querySelector('.nav-center');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            navCenter.classList.toggle('mobile-menu-active');
        });
    }
});