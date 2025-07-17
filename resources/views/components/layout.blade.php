<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Edukkep - Nursing Education Website' }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @if(isset($customCss))
        <link href="{{ asset('css/' . $customCss) }}" rel="stylesheet">
    @endif
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</head>
<body>
    <x-header />
    
    <main>
        {{ $slot }}
    </main>
    
    <x-footer />
    
    <div class="fixed-icons">
        <a href="https://wa.me/628123456789" class="whatsapp-icon" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://maps.app.goo.gl/mudmBmjxtoeMopsh8" class="maps-icon" target="_blank">
            <i class="fas fa-map-marker-alt"></i>
        </a>
    </div>

    <div id="appointmentModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <div class="modal-tabs">
                <button class="tab-button active" data-tab="appointment">Appointment</button>
                <button class="tab-button" data-tab="enquiry">Enquiry</button>
            </div>
            
            <div id="appointment-tab" class="tab-content active">
                <h3>Select a date and time slot to book an Appointment</h3>
                <div class="appointment-selection">
                    <div class="date-picker">
                        <label>Date Of Appointment</label>
                        <div class="date-navigation">
                            <button type="button" id="prevDate"><i class="fas fa-chevron-left"></i></button>
                            <span id="selectedDate"></span>
                            <button type="button" id="nextDate"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    
                    <div class="time-slots">
                        <div class="time-period">
                            <h4>Morning (7:00 AM - 11:30 AM)</h4>
                            <div class="time-grid">
                                <button type="button" class="time-slot" data-time="07:00">7:00 AM</button>
                                <button type="button" class="time-slot" data-time="07:30">7:30 AM</button>
                                <button type="button" class="time-slot" data-time="08:00">8:00 AM</button>
                                <button type="button" class="time-slot" data-time="08:30">8:30 AM</button>
                                <button type="button" class="time-slot" data-time="09:00">9:00 AM</button>
                                <button type="button" class="time-slot" data-time="09:30">9:30 AM</button>
                                <button type="button" class="time-slot" data-time="10:00">10:00 AM</button>
                                <button type="button" class="time-slot" data-time="10:30">10:30 AM</button>
                                <button type="button" class="time-slot" data-time="11:00">11:00 AM</button>
                                <button type="button" class="time-slot" data-time="11:30">11:30 AM</button>
                            </div>
                        </div>
                        
                        <div class="time-period">
                            <h4>Afternoon (12:00 PM - 3:30 PM)</h4>
                            <div class="time-grid">
                                <button type="button" class="time-slot" data-time="12:00">12:00 PM</button>
                                <button type="button" class="time-slot" data-time="12:30">12:30 PM</button>
                                <button type="button" class="time-slot" data-time="13:00">1:00 PM</button>
                                <button type="button" class="time-slot" data-time="13:30">1:30 PM</button>
                                <button type="button" class="time-slot" data-time="14:00">2:00 PM</button>
                                <button type="button" class="time-slot" data-time="14:30">2:30 PM</button>
                                <button type="button" class="time-slot" data-time="15:00">3:00 PM</button>
                                <button type="button" class="time-slot" data-time="15:30">3:30 PM</button>
                            </div>
                        </div>
                    
                        <div class="time-period">
                            <h4>Evening (4:00 PM - 9:00 PM)</h4>
                            <div class="time-grid">
                                <button type="button" class="time-slot" data-time="16:00">4:00 PM</button>
                                <button type="button" class="time-slot" data-time="16:30">4:30 PM</button>
                                <button type="button" class="time-slot" data-time="17:00">5:00 PM</button>
                                <button type="button" class="time-slot" data-time="17:30">5:30 PM</button>
                                <button type="button" class="time-slot" data-time="18:00">6:00 PM</button>
                                <button type="button" class="time-slot" data-time="18:30">6:30 PM</button>
                                <button type="button" class="time-slot" data-time="19:00">7:00 PM</button>
                                <button type="button" class="time-slot" data-time="19:30">7:30 PM</button>
                                <button type="button" class="time-slot" data-time="20:00">8:00 PM</button>
                                <button type="button" class="time-slot" data-time="20:30">8:30 PM</button>
                                <button type="button" class="time-slot" data-time="21:00">9:00 PM</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="appointment-form" class="appointment-form" style="display: none;">
                    <div class="appointment-info">
                        <h3 id="appointmentInfo"></h3>
                    </div>
                    <form id="finalAppointmentForm">
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
                            <div id="appointment-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        </div>
                        <button type="submit" class="submit-btn" id="appointmentSubmitBtn" disabled>Submit Appointment</button>
                    </form>
                </div>
            </div>
            
            <div id="enquiry-tab" class="tab-content">
                <h3>Send us your enquiry</h3>
                <form id="enquiryForm">
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
                        <div id="enquiry-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>
                    <button type="submit" class="submit-btn" id="enquirySubmitBtn" disabled>Submit Enquiry</button>
                </form>
            </div>
        </div>
    </div>

    <div id="searchModal" class="modal">
        <div class="modal-content">
            <span class="close-search">×</span>
            <h3>Search Results</h3>
            <div id="searchResults"></div>
        </div>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-content success-modal">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Success!</h3>
            <p id="successMessage"></p>
            <button class="btn btn-primary" onclick="closeSuccessModal()">OK</button>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>