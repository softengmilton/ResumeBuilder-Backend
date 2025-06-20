<div>
    <!-- Pricing Hero Section -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Simple, transparent pricing</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10">Choose the plan that works best for you. No hidden
                fees, cancel anytime.</p>

            <!-- Toggle -->
            <div class="flex justify-center mb-12">
                <div class="bg-gray-200 rounded-full p-1 flex">
                    <button class="px-6 py-2 rounded-full font-medium bg-white shadow-sm text-gray-800">Monthly</button>
                    <button class="px-6 py-2 rounded-full font-medium text-gray-600 hover:text-gray-800">Yearly (Save
                        20%)</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <!-- Free Plan -->
                <div class="border border-gray-200 rounded-lg p-8 hover:border-green-400 transition-all">
                    <h3 class="text-2xl font-bold mb-4">Basic</h3>
                    <p class="text-gray-600 mb-6">Basic features to get started</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">$20</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                    <a href="{{route('checkout', ['plan' => 'Basic'])}}"
                        class="block w-full py-3 px-4 border border-green-500 text-green-500 text-center font-medium rounded-md hover:bg-green-50 transition-colors mb-6">Get
                        Started</a>

                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>1 resume template</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Basic resume builder</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>PDF download</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-times mt-1 mr-2"></i>
                            <span>Multiple templates</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-times mt-1 mr-2"></i>
                            <span>Advanced customization</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-times mt-1 mr-2"></i>
                            <span>Cover letter builder</span>
                        </li>
                    </ul>
                </div>

                <!-- Premium Plan (Most Popular) -->
                <div
                    class="relative border-2 border-green-400 rounded-lg p-8 bg-white shadow-lg pricing-card transition-all">
                    <div class="popular-badge">MOST POPULAR</div>
                    <h3 class="text-2xl font-bold mb-4">Pro</h3>
                    <p class="text-gray-600 mb-6">Everything you need for job search</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">$59</span>
                        <span class="text-gray-500">/6 Months</span>
                    </div>
                    <a href="{{route('checkout', ['plan' => 'Pro'])}}"
                        class="block w-full py-3 px-4 bg-green-500 text-white text-center font-medium rounded-md hover:bg-green-600 transition-colors mb-6">Get Started</a>

                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>All resume templates</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Advanced resume builder</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>PDF & Word download</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Full customization</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Cover letter builder</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>ATS optimization</span>
                        </li>
                    </ul>
                </div>

                <!-- Executive Plan -->
                <div class="border border-gray-200 rounded-lg p-8 hover:border-green-400 transition-all">
                    <h3 class="text-2xl font-bold mb-4">Executive</h3>
                    <p class="text-gray-600 mb-6">Enterprise</p>
                    <div class="mb-8">
                        <span class="text-4xl font-bold">$99</span>
                        <span class="text-gray-500">/Yearly</span>
                    </div>
                    <a href="{{route('checkout', ['plan' => 'Enterprise'])}}"
                        class="block w-full py-3 px-4 border border-green-500 text-green-500 text-center font-medium rounded-md hover:bg-green-50 transition-colors mb-6">Start
                        Free Trial</a>

                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>All Premium features</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Executive templates</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Priority support</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Career coaching session</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>LinkedIn profile makeover</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Interview preparation</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Comparison -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl font-bold text-center mb-12">Compare Features</h2>

            <div class="overflow-x-auto">
                <table class="w-full max-w-4xl mx-auto bg-white rounded-lg overflow-hidden shadow-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="py-4 px-6 text-left font-medium text-gray-700">Features</th>
                            <th class="py-4 px-6 text-center font-medium text-gray-700">Free</th>
                            <th class="py-4 px-6 text-center font-medium text-gray-700">Premium</th>
                            <th class="py-4 px-6 text-center font-medium text-gray-700">Executive</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Resume Templates</td>
                            <td class="py-4 px-6 text-center">1</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">All</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">All + Executive</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Cover Letter Builder</td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">ATS Optimization</td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Export Formats</td>
                            <td class="py-4 px-6 text-center">PDF</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">PDF, Word</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">PDF, Word</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Customization Options</td>
                            <td class="py-4 px-6 text-center">Basic</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">Full</td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">Full</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Resume Checker</td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">Career Coaching</td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium">1 Session</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6">Priority Support</td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center"><i class="fas fa-times text-gray-400"></i></td>
                            <td class="py-4 px-6 text-center text-green-500 font-medium"><i class="fas fa-check"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-green-500 text-white">
        <div class="container mx-auto px-4 ">
            <h2 class="text-3xl font-bold text-center mb-12">Trusted by professionals worldwide</h2>

            <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <div class="bg-white bg-opacity-10 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User"
                                class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold">Sarah Johnson</h4>
                            <p class="text-green-100">Marketing Director</p>
                        </div>
                    </div>
                    <p class="italic">"Enhancv helped me land my dream job at Google. The resume templates are
                        professional and the ATS optimization is a game-changer."</p>
                    <div class="flex mt-4">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User"
                                class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold">Michael Chen</h4>
                            <p class="text-green-100">Software Engineer</p>
                        </div>
                    </div>
                    <p class="italic">"I went from 0 interview requests to 5 in one week after using Enhancv's
                        Executive
                        plan. The career coaching session was invaluable."</p>
                    <div class="flex mt-4">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User"
                                class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold">Jessica Williams</h4>
                            <p class="text-green-100">Product Manager</p>
                        </div>
                    </div>
                    <p class="italic">"The Premium plan was worth every penny. I got multiple job offers and was able
                        to
                        negotiate a 30% higher salary thanks to my new resume."</p>
                    <div class="flex mt-4">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 bg-white">
        <div class=" mx-auto px-4 max-w-7xl">
            <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>

            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors">
                        <span>Is there a free trial?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="p-4 border-t border-gray-200 hidden">
                        <p class="text-gray-600">Yes! All paid plans come with a 7-day free trial. You can cancel
                            anytime during the trial period and won't be charged.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors">
                        <span>Can I cancel my subscription anytime?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="p-4 border-t border-gray-200 hidden">
                        <p class="text-gray-600">Absolutely. You can cancel your subscription at any time from your
                            account settings. Your subscription will remain active until the end of the current billing
                            period.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors">
                        <span>What payment methods do you accept?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="p-4 border-t border-gray-200 hidden">
                        <p class="text-gray-600">We accept all major credit cards (Visa, MasterCard, American Express)
                            as well as PayPal.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors">
                        <span>Do you offer discounts for students or nonprofits?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="p-4 border-t border-gray-200 hidden">
                        <p class="text-gray-600">Yes! We offer a 30% discount for students and nonprofit organizations.
                            Please contact our support team with proof of status to get your discount code.</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors">
                        <span>How does the ATS optimization work?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="p-4 border-t border-gray-200 hidden">
                        <p class="text-gray-600">Our ATS optimization ensures your resume is formatted and structured
                            in
                            a way that applicant tracking systems can easily parse. We test against major ATS platforms
                            to maximize your resume's visibility.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="mb-6">Still have questions? We're happy to help!</p>
                <a href="mailto:support@enhancv.com"
                    class="inline-block py-3 px-6 bg-green-500 text-white font-medium rounded-md hover:bg-green-600 transition-colors">Contact
                    Support</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to build your winning resume?</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto mb-10">Join over 1 million professionals who landed jobs
                at top companies with Enhancv.</p>
            <a href="https://app.enhancv.com"
                class="inline-block py-4 px-8 bg-green-500 text-white font-bold rounded-md hover:bg-green-600 transition-colors text-lg">Get
                Started for Free</a>
        </div>
    </section>

    <!-- Footer -->
    <script>
        // Simple FAQ toggle functionality
        document.querySelectorAll('.border-gray-200 button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('i');

                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
</div>