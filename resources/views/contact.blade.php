<x-layout title="Contact - Edukkep" customCss="contact.css">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> |
            <span>Contact</span>
        </div>
        
        <h1 class="page-title">Contact Us</h1>
        
        <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.2623613305764!2d105.16458187569467!3d-2.050978936941511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e23670b56d76e15%3A0x161550811cf3612e!2sGg.%20Palem%20No.5%2C%20Sungai%20Daeng%2C%20Kec.%20Muntok%2C%20Kabupaten%20Bangka%20Barat%2C%20Kepulauan%20Bangka%20Belitung%2033351!5e0!3m2!1sen!2sid!4v1752783993808!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
        <div class="contact-section">
            <div class="contact-left">
                <h2>Get In Touch</h2>
                <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                <img src="https://img.freepik.com/free-vector/coronavirus-medical-staff-character-element_53876-116645.jpg" alt="Contact Us" class="contact-image">
            </div>
            
            <div class="contact-right">
                <form id="contactForm" class="contact-form">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Your Phone" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <div id="contact-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>
                    <button type="submit" class="submit-btn" id="contactSubmitBtn" disabled>Submit</button>
                </form>
            </div>
        </div>
        
        <div class="location-section">
            <h2>Our Location</h2>
            <div class="location-content">
                <div class="location-info">
                    <h3>Ryan Boby Aditya Purnomo</h3>
                    <div class="location-details">
                        <div class="location-left">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>Address:</strong><br>
                                   Gg. Palem No.5, Sungai Daeng, Kec. Muntok, Kabupaten Bangka Barat, Kepulauan Bangka Belitung
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <strong>Phone:</strong><br>
                                    +62 812-3456-7890
                                </div>
                            </div>
                        </div>
                        <div class="location-right">
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong>Email:</strong><br>
                                   ryanbobyaditya@gmail.com
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map"></i>
                                <div>
                                    <strong>Google Maps:</strong><br>
                                    <a href="https://maps.app.goo.gl/mudmBmjxtoeMopsh8">View on Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>