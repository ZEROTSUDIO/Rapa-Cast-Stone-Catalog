<x-front.layout>
    <section class="pt-40 pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Get In Touch</p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Contact Us</h2>

            <div class="grid md:grid-cols-2 gap-16 lg:gap-24">
                <div>
                    <h4 class="font-heading text-3xl mb-6 tracking-wide text-[#3A352F]">Visit Our Showroom</h4>
                    <p class="text-[#6B5E52] mb-10 leading-relaxed font-light">
                        Experience individual appointments at our New York showroom.
                        Our team is available to discuss your project requirements and show you our material collection.
                    </p>

                    <div class="mb-10">
                        <h6 class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Address</h6>
                        <p class="text-[#6B5E52] font-light leading-relaxed">
                            123 Stone Workshop Lane<br>
                            Craftsman District<br>
                            New York, NY 10001
                        </p>
                    </div>

                    <div class="mb-10">
                        <h6 class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Contact</h6>
                        <div class="space-y-2">
                            <a href="mailto:info@rapacaststone.com"
                                class="block text-[#6B5E52] hover:text-[#B5A693] transition-colors font-light">info@rapacaststone.com</a>
                            <a href="tel:+1234567890"
                                class="block text-[#6B5E52] hover:text-[#B5A693] transition-colors font-light">+1 (234)
                                567-890</a>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h6 class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Hours</h6>
                        <p class="text-[#6B5E52] font-light leading-relaxed">
                            Monday - Friday: 9am - 6pm<br>
                            Saturday: 10am - 4pm<br>
                            Sunday: By Appointment
                        </p>
                    </div>
                </div>

                <div>
                    <h4 class="font-heading text-3xl mb-8 tracking-wide text-[#3A352F]">Send a Message</h4>
                    <form class="space-y-8">
                        <div>
                            <label for="name"
                                class="block text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-3">Name</label>
                            <input type="text" id="name"
                                class="w-full bg-[#F5F1E8] border-b border-[#B5A693] px-4 py-3 text-[#6B5E52] focus:outline-none focus:border-[#3A352F] transition-colors duration-400 rounded-none">
                        </div>
                        <div>
                            <label for="email"
                                class="block text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-3">Email</label>
                            <input type="email" id="email"
                                class="w-full bg-[#F5F1E8] border-b border-[#B5A693] px-4 py-3 text-[#6B5E52] focus:outline-none focus:border-[#3A352F] transition-colors duration-400 rounded-none">
                        </div>
                        <div>
                            <label for="subject"
                                class="block text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-3">Subject</label>
                            <select id="subject"
                                class="w-full bg-[#F5F1E8] border-b border-[#B5A693] px-4 py-3 text-[#6B5E52] focus:outline-none focus:border-[#3A352F] transition-colors duration-400 rounded-none appearance-none">
                                <option selected>General Inquiry</option>
                                <option value="1">Project Quote</option>
                                <option value="2">Custom Commission</option>
                                <option value="3">Trade Program</option>
                            </select>
                        </div>
                        <div>
                            <label for="message"
                                class="block text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-3">Message</label>
                            <textarea id="message" rows="5"
                                class="w-full bg-[#F5F1E8] border-b border-[#B5A693] px-4 py-3 text-[#6B5E52] focus:outline-none focus:border-[#3A352F] transition-colors duration-400 rounded-none resize-none"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#6B5E52] text-white py-4 text-xs tracking-[2.5px] uppercase hover:bg-[#3A352F] transition-all duration-400 shadow-lg hover:shadow-xl hover:-translate-y-1">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
