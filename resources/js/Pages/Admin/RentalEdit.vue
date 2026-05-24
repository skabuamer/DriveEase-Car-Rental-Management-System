<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";

const rental = usePage().props.rental;

const form = useForm({
    status: rental.status,
});

const submit = () => {
    form.post(route("rentals.update", rental.id));
};
</script>

<template>
    <AdminLayout>
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-8">
                <h1 class="text-2xl font-bold mb-6">Update Rental Status</h1>
                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <label class="block mb-2 font-medium"> Status </label>

                        <select
                            v-model="form.status"
                            class="w-full border rounded-lg px-4 py-3"
                        >
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="bg-black text-white px-5 py-3 rounded-lg"
                    >
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
