<x-front.layout>
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <p class="section-subtitle">Get In Touch</p>
            <h2 class="section-title">Contact Us</h2>

            <div class="row justify-content-center">
                <div class="col-md-5 mb-5 mb-md-0">
                    <h4 class="mb-4">Visit Our Showroom</h4>
                    <p class="text-secondary mb-4">
                        Experience individual appointments at our New York showroom.
                        Our team is available to discuss your project requirements and show you our material collection.
                    </p>

                    <div class="mb-4">
                        <h6 class="text-uppercase small letter-spacing-2 mb-2">Address</h6>
                        <p class="text-secondary">
                            123 Stone Workshop Lane<br>
                            Craftsman District<br>
                            New York, NY 10001
                        </p>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase small letter-spacing-2 mb-2">Contact</h6>
                        <p class="text-secondary">
                            <a href="mailto:info@rapacaststone.com"
                                class="text-decoration-none text-secondary">info@rapacaststone.com</a><br>
                            <a href="tel:+1234567890" class="text-decoration-none text-secondary">+1 (234) 567-890</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase small letter-spacing-2 mb-2">Hours</h6>
                        <p class="text-secondary">
                            Monday - Friday: 9am - 6pm<br>
                            Saturday: 10am - 4pm<br>
                            Sunday: By Appointment
                        </p>
                    </div>
                </div>

                <div class="col-md-6 offset-md-1">
                    <h4 class="mb-4">Send a Message</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label small text-uppercase letter-spacing-2">Name</label>
                            <input type="text" class="form-control rounded-0 p-3 border-secondary-subtle"
                                id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label small text-uppercase letter-spacing-2">Email</label>
                            <input type="email" class="form-control rounded-0 p-3 border-secondary-subtle"
                                id="email">
                        </div>
                        <div class="mb-3">
                            <label for="subject"
                                class="form-label small text-uppercase letter-spacing-2">Subject</label>
                            <select class="form-select rounded-0 p-3 border-secondary-subtle" id="subject">
                                <option selected>General Inquiry</option>
                                <option value="1">Project Quote</option>
                                <option value="2">Custom Commission</option>
                                <option value="3">Trade Program</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="message"
                                class="form-label small text-uppercase letter-spacing-2">Message</label>
                            <textarea class="form-control rounded-0 p-3 border-secondary-subtle" id="message" rows="5"></textarea>
                        </div>
                        <button type="submit" class="cta-button w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </x-layout>
