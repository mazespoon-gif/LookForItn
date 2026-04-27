<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookforIt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
    <body class="bg-gray-100 dark:bg-gray-900  transition-colors duration-200 ">
        <div class="max-w-3xl mx-auto px-4  flex justify-start">
            <a href="{{ route('home')}}" wire:navigate>
                 <button
                            class="flex items-center gap-2 bg-blue-700 hover:bg-indigo-700 text-white text-sm px-6 py-3 mt-6 rounded-lg transition cursor-pointer group"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                <path
                                    d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z"
                                />
                            </svg>
                            <div class="relative overflow-hidden">
                                <span
                                    class="block transition-transform duration-200 group-hover:-translate-y-full"
                                >
                                    Back to home
                                </span>
                                <span
                                    class="absolute top-0 left-0 block transition-transform duration-200 group-hover:translate-y-0 translate-y-full"
                                >
                                    Back to home
                                </span>
                            </div>
                        </button>
            </a>
        </div>
        <main class="max-w-3xl mx-auto px-4 py-12">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-sky-600 to-sky-500 dark:from-sky-700 dark:to-sky-600 px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Ethical Posting Guidelines</h1>
                            <p class="text-sky-100 text-sm">Lost & Found System</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Please follow these ethical standards when posting lost and found items. Your cooperation helps maintain a safe and trustworthy environment for our school community.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 dark:text-blue-400 font-bold">1</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Accuracy</h3>
                                <p class="text-gray-500 dark:text-gray-400">Provide truthful and correct information about lost or found items.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-emerald-600 dark:text-emerald-400 font-bold">2</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Privacy</h3>
                                <p class="text-gray-500 dark:text-gray-400">Do not share sensitive personal information such as phone numbers, addresses, or identification numbers.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-violet-100 dark:bg-violet-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-violet-600 dark:text-violet-400 font-bold">3</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Relevance</h3>
                                <p class="text-gray-500 dark:text-gray-400">Only post lost and found items related to the school.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-amber-600 dark:text-amber-400 font-bold">4</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Respectful Language</h3>
                                <p class="text-gray-500 dark:text-gray-400">Use appropriate language. Offensive, abusive, or inappropriate content is prohibited.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-rose-600 dark:text-rose-400 font-bold">5</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Image Use</h3>
                                <p class="text-gray-500 dark:text-gray-400">Images must clearly show the item and must not contain harmful or unrelated content.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-cyan-100 dark:bg-cyan-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-cyan-600 dark:text-cyan-400 font-bold">6</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">No Spam or Duplicates</h3>
                                <p class="text-gray-500 dark:text-gray-400">Avoid repeated posts or irrelevant content.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center flex-shrink-0">
                                <span class="text-indigo-600 dark:text-indigo-400 font-bold">7</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Compliance</h3>
                                <p class="text-gray-500 dark:text-gray-400">Follow all school policies and regulations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex items-center gap-3 p-4 bg-amber-50 dark:bg-amber-900/20 rounded-xl border border-amber-200 dark:border-amber-700">
                        <svg class="w-6 h-6 text-amber-600 dark:text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <p class="text-amber-800 dark:text-amber-200 font-medium">
                            <strong>Note:</strong> Violation of these guidelines may result in account restrictions.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        @livewireScripts
    </body>
</html>