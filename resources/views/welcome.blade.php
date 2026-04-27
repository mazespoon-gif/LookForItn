<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LookForIt</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-white">
        <nav
            class="bg-white border-b sticky top-0 p-2 border-gray-200 shadow-sm w-full px-4 sm:px-6 lg:px-6 z-50"
        >
            <div class="flex h-16 justify-between items-center w-full gap-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                    <!-- <div class="h-10 w-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                        L
                    </div> -->
                    <x-app-logo-icon class="h-8 w-8 rounded-md" />
                    <span
                        class="ml-3 font-bold text-xl text-gray-800 tracking-tight"
                        >LookForit</span
                    >
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:gap-6">
                    <a
                        href="{{ route('guideline') }}"
                        wire:navigate
                        class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors"
                        >Guideline</a
                    >
                    <a
                        href="#faq"
                        class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors"
                        >FAQ</a
                    >
                    <a
                        href="{{ route('login') }}"
                        wire:navigate
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bolder bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors shadow-sm"
                    >
                        Sign In
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button
                        type="button"
                        id="mobile-menu-toggle"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            id="menu-icon-closed"
                            class="block h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                        <svg
                            id="menu-icon-open"
                            class="hidden h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                id="mobile-menu"
                class="hidden sm:hidden bg-white border-t border-gray-100 px-4"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <a
                        href="{{ route('guideline') }}"
                        class="block text-gray-600 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium"
                        >Guideline</a
                    >
                    <a
                        href="#faq"
                        class="block text-gray-600 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium"
                        >FAQ</a
                    >
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a
                            href="{{ route('login') }}"
                            wire:navigate
                            class="block w-full text-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                        >
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="w-full flex p-4 sm:p-6 lg:p-8 flex-col">
            <div
                class="w-full h-auto rounded-lg flex flex-col items-center justify-center"
            >

                    <h1
                        class="text-3xl font-semibold text-gray-800 text-center lg:text-4xl mt-5"
                    >
                        Welcome in lookForIt
                    </h1>

                <p class="text-lg text-gray-600 mt-2 text-center">
                    Designed to help students efficiently report lost
                    belongings, discover found items, and retrieve safe and
                    reliable item recovery across the campus.
                </p>
                <!-- Authentication if login already it Display go to Dashboard
            If not Get started -->
                <div class="flex justify-center gap-3 w-full mt-2">
                    @auth
                    <a href="{{ route('dashboard') }}"
                        wire:navigate>
                        <button
                            class="flex items-center gap-2 bg-blue-700 hover:bg-indigo-700 text-white text-sm px-6 py-3 mt-6 rounded-lg transition cursor-pointer group"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-play-icon lucide-play"
                            >
                                <path
                                    d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z"
                                />
                            </svg>
                            <div class="relative overflow-hidden">
                                <span
                                    class="block transition-transform duration-200 group-hover:-translate-y-full"
                                >
                                    Go to Dashboard
                                </span>
                                <span
                                    class="absolute top-0 left-0 block transition-transform duration-200 group-hover:translate-y-0 translate-y-full"
                                >
                                    To find you item
                                </span>
                            </div>
                        </button>
                    </a>
                    @else
                    <a href="{{ route('register') }}"
                        wire:navigate>
                        <button
                            class="flex items-center gap-2 bg-blue-700 hover:bg-indigo-700 text-white text-sm px-6 py-3 mt-6 rounded-lg transition cursor-pointer group"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-play-icon lucide-play"
                            >
                                <path
                                    d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z"
                                />
                            </svg>
                            <div class="relative overflow-hidden">
                                <span
                                    class="block transition-transform duration-200 group-hover:-translate-y-full"
                                >
                                    Get Started
                                </span>
                                <span
                                    class="absolute top-0 left-0 block transition-transform duration-200 group-hover:translate-y-0 translate-y-full"
                                >
                                    Get Started
                                </span>
                            </div>
                        </button>
                    </a>
                    @endauth
                </div>
                <!-- glowing circles section  -->
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 items-center gap-8 sm:gap-16 mt-7 px-4"
                >
                    <div class="flex items-center gap-2">
                        <div
                            class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600"
                        >
                            <span
                                class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"
                            ></span>
                            <span
                                class="relative inline-flex size-1.5 rounded-full bg-indigo-50"
                            ></span>
                        </div>
                        <p class="text-sm text-center text-zinc-600">
                            Post Lost Items
                        </p>
                    </div>
                    <div class="flex items-center gap-2 justify-center">
                        <div
                            class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600"
                        >
                            <span
                                class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"
                            ></span>
                            <span
                                class="relative inline-flex size-1.5 rounded-full bg-indigo-50"
                            ></span>
                        </div>
                        <p class="text-sm text-center text-zinc-600">
                            Help Return Items
                        </p>
                    </div>
                    <div
                        class="flex items-center gap-2 col-span-2 sm:col-span-1 justify-center sm:justify-start"
                    >
                        <div
                            class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600"
                        >
                            <span
                                class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"
                            ></span>
                            <span
                                class="relative inline-flex size-1.5 rounded-full bg-indigo-50"
                            ></span>
                        </div>
                        <p class="text-sm text-center text-zinc-600">
                            Students Helping Students
                        </p>
                    </div>
                </div>

                <!-- This is an image section here!! -->
                <div
                    class="flex justify-center mt-3 w-full p-3"
                    style="animation: hello 1s ease forwards"
                >
                    <img
                        class="object-cover w-full h-96 rounded-xl lg:w-4/5"
                        style="-webkit-user-drag: none; user-drag: none"
                        src="https://scontent.fceb1-1.fna.fbcdn.net/v/t1.15752-9/645729335_2266825154104479_3941833836043239693_n.jpg?stp=dst-jpg_s2048x2048_tt6&_nc_cat=106&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGY_MuUAnVv4bkhFB6fNru98K8wJDA9ByDwrzAkMD0HIPmRqyZ2pnVJWnZqyxMSbZMSW4CjGsX4chGgEF5uPp4V&_nc_ohc=UFiwA-Y-O2UQ7kNvwEVjT7-&_nc_oc=AdobX8bj_r9IRMZns8K_TSCn4BtCvD_BQ2d0EjtVViX2tPDTotfLzdl0l6Y0_PO8mjdmNGebMCXkrSG5cfr0Zik1&_nc_zt=23&_nc_ht=scontent.fceb1-1.fna&_nc_ss=7a3a8&oh=03_Q7cD5AHyKXbumOx-PnI5CGgcdZxqdUSG7eDnnXZhhQlUrMszuA&oe=69F48825"
                    />
                </div>
            </div>
        </div>
        <!-- for now this is a placeholder because i don't know the content should i put  -->
        <div class="mt-2 w-full p-2 ">
            <h1 class="text-3xl text-black font-semibold text-center mx-auto">
                The Main features
            </h1>
            <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">
                This website help students in TCC to quickly find their lost &
                found items.
            </p>
            <!-- this is a static image is here  -->
            <div class="flex flex-wrap items-center justify-center gap-8 mt-10">
                <div
                    class="max-w-72 w-full hover:-translate-y-0.5 transition duration-300"
                >
                    <img
                        class="rounded-xl w-full h-48 object-cover"
                        src="https://scontent.fceb1-5.fna.fbcdn.net/v/t1.15752-9/638285348_4420230848198981_6236481490877808761_n.jpg?stp=dst-jpg_s2048x2048_tt6&_nc_cat=110&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeE2EWOJFv_HeAmypbywmUs50-lENr8OGkHT6UQ2vw4aQSQZ0VDpZv7LsG4TO7t2tjzxRY6gZeyKkR6ZSWL6KYHR&_nc_ohc=8AHVJUSMG6IQ7kNvwEpDhd5&_nc_oc=Adr2eYjgoFcW4F-_m12MPedjZUPePtG5Y3xvdzOnGXBOK2EcIgsH7l6Py53tn4qOBGYUEvY3VfK-Sy6kXk3H052E&_nc_zt=23&_nc_ht=scontent.fceb1-5.fna&_nc_ss=7a3a8&oh=03_Q7cD5AHnBaJS21U-2mwJc-Q3lZu5r_2r-ec4PHfF9i7ko3Kctg&oe=69F46A99"
                        alt="room"
                    />
                    <h3 class="text-base text-slate-900 font-medium mt-3">
                        Supported with lightmode and Dark
                    </h3>
                    <p class="text-xs text-indigo-600 font-medium mt-1">
                        Theme
                    </p>
                </div>
                <div
                    class="max-w-72 w-full hover:-translate-y-0.5 transition duration-300"
                >
                    <img
                        class="rounded-xl w-full h-48 object-cover"
                        src="https://scontent.fceb1-5.fna.fbcdn.net/v/t1.15752-9/638285348_4420230848198981_6236481490877808761_n.jpg?stp=dst-jpg_s2048x2048_tt6&_nc_cat=110&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeE2EWOJFv_HeAmypbywmUs50-lENr8OGkHT6UQ2vw4aQSQZ0VDpZv7LsG4TO7t2tjzxRY6gZeyKkR6ZSWL6KYHR&_nc_ohc=8AHVJUSMG6IQ7kNvwEpDhd5&_nc_oc=Adr2eYjgoFcW4F-_m12MPedjZUPePtG5Y3xvdzOnGXBOK2EcIgsH7l6Py53tn4qOBGYUEvY3VfK-Sy6kXk3H052E&_nc_zt=23&_nc_ht=scontent.fceb1-5.fna&_nc_ss=7a3a8&oh=03_Q7cD5AHnBaJS21U-2mwJc-Q3lZu5r_2r-ec4PHfF9i7ko3Kctg&oe=69F46A99"
                        alt="room"
                    />
                    <h3 class="text-base text-slate-900 font-medium mt-3">
                        5000ms Delay of sending data
                    </h3>
                    <p class="text-xs text-indigo-600 font-medium mt-1">
                        Near to realtime
                    </p>
                </div>
                <div
                    class="max-w-72 w-full hover:-translate-y-0.5 transition duration-300"
                >
                    <img
                        class="rounded-xl w-full h-48 object-cover"
                        src="https://scontent.fceb1-5.fna.fbcdn.net/v/t1.15752-9/638285348_4420230848198981_6236481490877808761_n.jpg?stp=dst-jpg_s2048x2048_tt6&_nc_cat=110&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeE2EWOJFv_HeAmypbywmUs50-lENr8OGkHT6UQ2vw4aQSQZ0VDpZv7LsG4TO7t2tjzxRY6gZeyKkR6ZSWL6KYHR&_nc_ohc=8AHVJUSMG6IQ7kNvwEpDhd5&_nc_oc=Adr2eYjgoFcW4F-_m12MPedjZUPePtG5Y3xvdzOnGXBOK2EcIgsH7l6Py53tn4qOBGYUEvY3VfK-Sy6kXk3H052E&_nc_zt=23&_nc_ht=scontent.fceb1-5.fna&_nc_ss=7a3a8&oh=03_Q7cD5AHnBaJS21U-2mwJc-Q3lZu5r_2r-ec4PHfF9i7ko3Kctg&oe=69F46A99"
                        alt="room"
                    />
                    <h3 class="text-base text-slate-900 font-medium mt-3">
                        Hello world meaning of
                    </h3>
                    <p class="text-xs text-indigo-600 font-medium mt-1">
                        Email verification
                    </p>
                </div>
            </div>
        </div>
        <!--this is about area-->


        <!--Here is the FQA section is here -->
        <div id="faq" class="w-full p-2 ">
            <div class="mt-10">
                <h2 class="text-center text-indigo-600 font-bold text-3xl">
                    FQA
                </h2>
                <p class="text-center text-gray-700">
                    The Frequently Asked Question
                </p>

                <div class="px-8 mt-6">
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>What is this platform for?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                This platform is used to report and find lost
                                items within the school campus. It connects
                                students and staff to help return misplaced
                                belongings.
                            </p>
                        </div>
                    </details>

                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>Who can use this system?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                Only students, faculty, and staff within the
                                campus are allowed to use this system.
                            </p>
                        </div>
                    </details>

                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>How do I report a lost item?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                You can report a lost item by filling out the
                                “Lost Item” form and providing details such as
                                item name, description, location, and date.
                            </p>
                        </div>
                    </details>
                    <!--the fourt accord-->
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>How do I report a found item?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                If you found an item, you can submit it using
                                the “Found Item” form with clear details and, if
                                possible, upload a photo.
                            </p>
                        </div>
                    </details>
                    <!--The fifth accordion-->
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>Is it required to upload an image?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                Uploading an image is optional but highly
                                recommended to make identification easier and
                                faster.
                            </p>
                        </div>
                    </details>
                    <!--The sixth accordion-->
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>How can I claim my lost item?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                If you see your item listed, contact the person
                                who posted it or follow the instructions
                                provided in the post.
                            </p>
                        </div>
                    </details>
                    <!--The seventh accordion-->
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>Is my Personal Information safe?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                Yes, your personal information is protected and
                                only used for communication related to lost and
                                found items.
                            </p>
                        </div>
                    </details>
                    <!--The eighth accordion-->
                    <details
                        class="group [&amp;_summary::-webkit-details-marker]:hidden"
                    >
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50"
                        >
                            <span>Can I delete or edit my post?</span>

                            <svg
                                class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                Yes, Absolutly you can update or remove your
                                post once your item has been found or returned.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
        <!--This is the footer part -->
        <footer
            class="bg-white dark:bg-gray-900 border border-t-gray-600 mt-10"
        >
            <div
                class="container flex flex-col items-center justify-between p-6 mx-auto space-y-4 sm:space-y-0 sm:flex-row"
            >
                <div class="flex gap-2 item-center justify-center">
                        <x-app-logo-icon class="h-10 w-10 rounded-md" />

                </div>

                <p class="text-sm text-gray-600 dark:text-gray-300">
                    © Copyright 2026. All Rights Reserved.
                </p>

                <div class="flex -mx-2">
                    <a
                        href="#"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Reddit"
                    >
                        <svg
                            class="w-5 h-5 fill-current"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"
                            ></path>
                        </svg>
                    </a>

                    <a
                        href="https://www.facebook.com/TCCofficialfbpage"
                        target="_blank"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Facebook"
                    >
                        <svg
                            class="w-5 h-5 fill-current"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"
                            ></path>
                        </svg>
                    </a>

                    <a
                        href="https://github.com/mazespoon-gif/LookForItn"
                        class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                        aria-label="Github"
                    >
                        <svg
                            class="w-5 h-5 fill-current"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"
                            ></path>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    @livewireScripts
    </body>
</html>
