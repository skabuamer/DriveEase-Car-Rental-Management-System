<script setup>
import DropdownMenu from "@/Components/ui/dropdown-menu/DropdownMenu.vue";
import DropdownMenuContent from "@/Components/ui/dropdown-menu/DropdownMenuContent.vue";
import DropdownMenuGroup from "@/Components/ui/dropdown-menu/DropdownMenuGroup.vue";
import DropdownMenuItem from "@/Components/ui/dropdown-menu/DropdownMenuItem.vue";
import DropdownMenuLabel from "@/Components/ui/dropdown-menu/DropdownMenuLabel.vue";
import DropdownMenuTrigger from "@/Components/ui/dropdown-menu/DropdownMenuTrigger.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import { toast, Toaster } from "vue-sonner";

const auth = usePage().props.auth;
const role = computed(() => auth?.user?.role);

const page = usePage();

// Watch for changes in Inertia's flash session data
watch(
    () => page.props.flash,
    (flash) => {
        if (!flash) return;

        if (flash.success) {
            toast.success(flash.success);
        }
        if (flash.error) {
            toast.error(flash.error);
        }
    },
    { deep: true, immediate: true },
);

const isMobileMenuOpen = ref(false);
const showStatusBar = ref(true);
const showActivityBar = ref(false);
const showPanel = ref(false);

const position = ref("bottom");
</script>

<template>
    <!-- Navbar -->
    <nav
        class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
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

                <div class="hidden md:flex items-center gap-1">
                    <Link
                        href="/"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Home</Link
                    >
                    <Link
                        href="/about"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >About</Link
                    >
                    <Link
                        href="/cars"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Rentals</Link
                    >
                    <Link
                        href="/contact"
                        class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                        >Contact</Link
                    >
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <div
                        class="flex items-center gap-3"
                        v-if="$page.props.auth.user"
                    >
                        <Link
                            :href="route('dashboard')"
                            v-if="role === 'admin'"
                            class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
                            >Dashboard
                        </Link>
                        <Link
                            href="/my-bookings"
                            class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-600 hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all duration-200"
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
                        </Link>

                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <Button variant="outline">
                                    <div class="flex items-center gap-3 pl-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-linear-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white text-xs font-bold"
                                        >
                                            {{
                                                $page.props.auth.user.name.charAt(
                                                    0,
                                                )
                                            }}
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-medium text-slate-700 text-left"
                                            >
                                                {{ $page.props.auth.user.name }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{
                                                    $page.props.auth.user.email
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent class="w-56" align="start">
                                <DropdownMenuLabel>
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-linear-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white text-xs font-bold shrink-0"
                                        >
                                            {{
                                                $page.props.auth.user.name.charAt(
                                                    0,
                                                )
                                            }}
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-medium text-slate-700"
                                            >
                                                {{ $page.props.auth.user.name }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{
                                                    $page.props.auth.user.email
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </DropdownMenuLabel>
                                <DropdownMenuSeparator />
                                <DropdownMenuGroup>
                                    <DropdownMenuItem
                                        @click="router.post(route('logout'))"
                                    >
                                        Log Out
                                    </DropdownMenuItem>
                                </DropdownMenuGroup>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </div>

                    <div class="flex items-center gap-3" v-else>
                        <Link
                            href="/login"
                            class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-primary-600 transition-colors"
                            >Login</Link
                        >
                        <Link
                            href="/register"
                            class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl hover:from-primary-700 hover:to-primary-800 shadow-md shadow-primary-500/25 transition-all duration-200 hover:shadow-lg hover:shadow-primary-500/30"
                            >Sign Up</Link
                        >
                    </div>
                </div>

                <div class="flex items-center md:hidden">
                    <button
                        @click="isMobileMenuOpen = !isMobileMenuOpen"
                        type="button"
                        class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-slate-600 hover:bg-slate-100 focus:outline-hidden"
                        aria-controls="mobile-menu"
                        :aria-expanded="isMobileMenuOpen"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            v-if="!isMobileMenuOpen"
                            class="block h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                        <svg
                            v-else
                            class="block h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div
            class="md:hidden border-t border-slate-200/60 bg-white"
            id="mobile-menu"
            v-show="isMobileMenuOpen"
        >
            <div class="space-y-1 px-4 pt-2 pb-3">
                <Link
                    href="/"
                    class="block px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                    >Home</Link
                >
                <Link
                    href="/about"
                    class="block px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                    >About</Link
                >
                <Link
                    href="/cars"
                    class="block px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                    >Rentals</Link
                >
                <Link
                    href="/contact"
                    class="block px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                    >Contact</Link
                >
            </div>

            <div class="border-t border-slate-200/60 pt-4 pb-4 px-4">
                <div v-if="$page.props.auth.user" class="space-y-3">
                    <div class="flex items-center gap-3 px-3 mb-4">
                        <div
                            class="w-10 h-10 rounded-full bg-linear-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white text-sm font-bold shrink-0"
                        >
                            {{ $page.props.auth.user.name.charAt(0) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-800">
                                {{ $page.props.auth.user.name }}
                            </p>
                            <p class="text-xs text-slate-500">
                                {{ $page.props.auth.user.email }}
                            </p>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <Link
                            :href="route('dashboard')"
                            v-if="role === 'admin'"
                            class="block px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                            >Dashboard
                        </Link>
                        <Link
                            href="/my-bookings"
                            class="flex items-center gap-2 px-3 py-2.5 text-base font-medium text-slate-600 hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-colors"
                        >
                            <svg
                                class="w-5 h-5"
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
                        </Link>
                        <button
                            @click="router.post(route('logout'))"
                            class="w-full text-left block px-3 py-2.5 text-base font-medium text-rose-600 hover:bg-rose-50 rounded-xl transition-colors"
                        >
                            Log Out
                        </button>
                    </div>
                </div>

                <div v-else class="grid grid-cols-2 gap-3">
                    <Link
                        href="/login"
                        class="block text-center px-4 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors"
                        >Login</Link
                    >
                    <Link
                        href="/register"
                        class="block text-center px-4 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 rounded-xl text-center shadow-md shadow-primary-500/10 transition-all duration-200"
                        >Sign Up</Link
                    >
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="pt-16">
        <slot />
        <Toaster richColors position="top-center" closeButton />
    </main>

    <!-- Footer -->
    <footer class="bg-surface-dark text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Brand -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div
                            class="w-9 h-9 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center"
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
                        <span class="text-xl font-bold">DriveEase</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Your trusted partner for premium car rentals. Quality
                        vehicles at affordable prices.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4
                        class="font-semibold mb-4 text-sm uppercase tracking-wider text-slate-300"
                    >
                        Quick Links
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <router-link
                                to="/"
                                class="text-slate-400 hover:text-white text-sm transition-colors"
                                >Home</router-link
                            >
                        </li>
                        <li>
                            <router-link
                                to="/about"
                                class="text-slate-400 hover:text-white text-sm transition-colors"
                                >About Us</router-link
                            >
                        </li>
                        <li>
                            <router-link
                                to="/cars"
                                class="text-slate-400 hover:text-white text-sm transition-colors"
                                >Browse Cars</router-link
                            >
                        </li>
                        <li>
                            <router-link
                                to="/contact"
                                class="text-slate-400 hover:text-white text-sm transition-colors"
                                >Contact</router-link
                            >
                        </li>
                    </ul>
                </div>

                <!-- Car Types -->
                <div>
                    <h4
                        class="font-semibold mb-4 text-sm uppercase tracking-wider text-slate-300"
                    >
                        Car Types
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <span class="text-slate-400 text-sm">Sedan</span>
                        </li>
                        <li><span class="text-slate-400 text-sm">SUV</span></li>
                        <li>
                            <span class="text-slate-400 text-sm">Sports</span>
                        </li>
                        <li>
                            <span class="text-slate-400 text-sm">Luxury</span>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4
                        class="font-semibold mb-4 text-sm uppercase tracking-wider text-slate-300"
                    >
                        Contact Info
                    </h4>
                    <ul class="space-y-2.5">
                        <li
                            class="text-slate-400 text-sm flex items-start gap-2"
                        >
                            <svg
                                class="w-4 h-4 mt-0.5 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            123 Main Street, City, Country
                        </li>
                        <li
                            class="text-slate-400 text-sm flex items-center gap-2"
                        >
                            <svg
                                class="w-4 h-4 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                            +1 234 567 890
                        </li>
                        <li
                            class="text-slate-400 text-sm flex items-center gap-2"
                        >
                            <svg
                                class="w-4 h-4 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                            info@driveease.com
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-slate-700/50 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center"
            >
                <p class="text-slate-500 text-sm">
                    &copy; 2025 DriveEase. All rights reserved.
                </p>
                <p class="text-slate-500 text-sm mt-2 sm:mt-0">
                    Payment: Cash on Delivery
                </p>
            </div>
        </div>
    </footer>
</template>
