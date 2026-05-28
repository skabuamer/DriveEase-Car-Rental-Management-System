<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const car = page.props.car;

const form = useForm({
    car_id: car.id,
    start_date: "",
    end_date: "",
});

const duration = computed(() => {
    if (!form.start_date || !form.end_date) return 0;

    const start = new Date(form.start_date);
    const end = new Date(form.end_date);

    const diffTime = end - start;

    return diffTime > 0 ? Math.ceil(diffTime / (1000 * 60 * 60 * 24)) : 0;
});

const totalCost = computed(() => {
    return duration.value * car.daily_rent_price;
});

const today = new Date();
today.setDate(today.getDate() + 1);

const minStartDate = today.toISOString().split("T")[0];

const minEndDate = computed(() => {
    if (!form.start_date) return minStartDate;
    return form.start_date;
});

const submit = () => {
    // if (!form.start_date || !form.end_date) {
    //     alert("Please select dates");
    //     return;
    // }

    // if (form.end_date <= form.start_date) {
    //     alert("End date must be after start date");
    //     return;
    // }

    form.post("/rentals", {
        onSuccess: () => {
            // if (page.props.flash.success) {
            //     alert("Booking successful!");
            // }
            // if (page.props.flash.error) {
            //     alert(page.props.flash.error);
            // }
        },
    });
};
</script>

<template>
    <GuestLayout>
        <section class="py-10">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav
                    class="flex items-center gap-2 text-sm text-slate-500 mb-8"
                >
                    <Link
                        href="/"
                        class="hover:text-primary-600 transition-colors"
                        >Home</Link
                    >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                    <Link
                        href="/cars"
                        class="hover:text-primary-600 transition-colors"
                        >Cars</Link
                    >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-slate-700 font-medium">Book Car</span>
                </nav>

                <h1 class="text-3xl font-extrabold text-slate-900 mb-8">
                    Book Your Car
                </h1>

                <!-- Selected Car Summary -->
                <div
                    class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 flex flex-wrap items-center gap-5"
                >
                    <div
                        class="w-24 h-20 bg-linear-to-br from-slate-100 to-slate-50 rounded-xl flex items-center justify-center shrink-0"
                    >
                        <!-- <span class="text-4xl">🚗</span> -->
                        <img :src="`/storage/${car.image}`" alt="Image" />
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-900">
                            {{ car.name }}
                        </h3>
                        <p class="text-sm text-slate-500">
                            {{ car.brand }} • {{ car.model }} • {{ car.year }} •
                            {{ car.car_type }}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-extrabold text-primary-600">
                            ${{ car.daily_rent_price }}
                        </p>
                        <p class="text-xs text-slate-400">per day</p>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="bg-white rounded-2xl border border-slate-200 p-8">
                    <h2 class="text-xl font-bold text-slate-900 mb-6">
                        Rental Details
                    </h2>

                    <form @submit.prevent="submit" class="space-y-5">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-700 mb-1.5"
                                    >Start Date</label
                                >
                                <input
                                    type="date"
                                    v-model="form.start_date"
                                    :min="minStartDate"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                />
                                <p class="text-xs text-red-500 mt-2">
                                    {{ form.errors.start_date }}
                                </p>
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-700 mb-1.5"
                                    >End Date</label
                                >
                                <input
                                    type="date"
                                    v-model="form.end_date"
                                    :min="minEndDate"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                />
                                <p class="text-xs text-red-500 mt-2">
                                    {{ form.errors.end_date }}
                                </p>
                            </div>
                        </div>

                        <!-- Cost Breakdown -->
                        <div class="bg-slate-50 rounded-xl p-5 mt-2">
                            <h3
                                class="text-sm font-semibold text-slate-700 mb-3"
                            >
                                Cost Breakdown
                            </h3>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500"
                                        >Daily Rate</span
                                    >
                                    <span class="text-slate-700 font-medium"
                                        >${{ car.daily_rent_price }}</span
                                    >
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500">Duration</span>
                                    <span class="text-slate-700 font-medium"
                                        >{{ duration }} days</span
                                    >
                                </div>
                                <div
                                    class="border-t border-slate-200 pt-2 mt-2 flex justify-between"
                                >
                                    <span class="font-bold text-slate-900"
                                        >Total Cost</span
                                    >
                                    <span
                                        class="font-extrabold text-primary-600 text-lg"
                                        >${{ totalCost }}</span
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div
                            class="p-4 bg-amber-50 border border-amber-200 rounded-xl flex items-start gap-3"
                        >
                            <svg
                                class="w-5 h-5 text-amber-600 shrink-0 mt-0.5"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-amber-800">
                                    Payment: Cash on Pickup
                                </p>
                                <p class="text-xs text-amber-600 mt-0.5">
                                    Please bring the exact amount when picking
                                    up your car.
                                </p>
                            </div>
                        </div>

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-2xl shadow-xl shadow-primary-500/25 hover:shadow-2xl hover:shadow-primary-500/40 hover:from-primary-700 hover:to-primary-800 transition-all duration-300 text-lg disabled:opacity-50 disabled:pointer-events-none"
                        >
                            Confirm Booking
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
