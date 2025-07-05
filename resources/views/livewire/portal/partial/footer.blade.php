<div>
    <footer class="bg-gray-800 text-gray-300 py-12">
        <div class="container mx-auto px-4 md:px-44">
            <div class="grid md:grid-cols-5 gap-8 mb-8">
                <div>
                    <h3 class="text-white font-medium mb-4">Get started</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Create Resume</a></li>
                        <li><a href="#" class="hover:text-white">Pricing</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Resume</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Resume Examples</a></li>
                        <li><a href="#" class="hover:text-white">Resume Templates</a></li>
                        <li><a href="#" class="hover:text-white">Resume Builder</a></li>
                        <li><a href="#" class="hover:text-white">Resume Checker</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Cover Letter</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Cover Letter Builder</a></li>
                        <li><a href="#" class="hover:text-white">Cover Letter Examples</a></li>
                        <li><a href="#" class="hover:text-white">Cover Letter Templates</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Resume Guides</a></li>
                        <li><a href="#" class="hover:text-white">Interview Tips</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="{{ asset('storage/' . $setting['logo_path']) }}" alt="{{ $setting['site_title'] }}" class="h-12">
                    <span class="text-white">© 2025 {{ $setting['site_title'] }}. All rights reserved.</span>
                </div>

                <div class="flex space-x-6">
                    <a href="{{ $setting['site_facebook_link'] }}" class="hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $setting['site_twitter_link'] }}" class="hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $setting['site_linkedin_link'] }}" class="hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="{{ $setting['site_instagram_link'] }}" class="hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>