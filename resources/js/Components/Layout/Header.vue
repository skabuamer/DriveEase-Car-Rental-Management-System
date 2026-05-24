<nav
    class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60"
>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <router-link to="/" class="flex items-center gap-2.5">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-primary-600 to-accent-600 rounded-xl flex items-center justify-center"
                    >
                        <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9 17a2 2 0 100-4 2 2 0 000 4zm6 0a2 2 0 100-4 2 2 0 000 4z"
                            />
                            <path
                                d="M5 17h-2a1 1 0 01-1-1v-4l2-6h12l2 6v4a1 1 0 01-1 1h-2m-8 0h8"
                            />
                        </svg>
                    </div>
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-primary-700 to-accent-600 bg-clip-text text-transparent"
                        >DriveEase</span
                    >
                </router-link>

                <!-- Nav Links -->
                <div class="hidden md:flex items-center gap-1">
                    <router-link
                        to="/"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Home</router-link
                    >
                    <router-link
                        to="/about"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >About</router-link
                    >
                    <router-link
                        to="/cars"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Rentals</router-link
                    >
                    <router-link
                        to="/contact"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Contact</router-link
                    >
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <router-link
                        to="/my-bookings"
                        class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                            />
                        </svg>
                        My Bookings
                    </router-link>
                    <router-link
                        to="/login"
                        class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-primary-600 transition-colors"
                        >Login</router-link
                    >
                    <router-link
                        to="/signup"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl hover:from-primary-700 hover:to-primary-800 shadow-md shadow-primary-500/25 transition-all duration-200 hover:shadow-lg hover:shadow-primary-500/30"
                        >Sign Up</router-link
                    >
                </div>
            </div>
        </div>
    </nav>
