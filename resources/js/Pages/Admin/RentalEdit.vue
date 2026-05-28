<script setup>
import Select from "@/Components/ui/select/Select.vue";
import SelectContent from "@/Components/ui/select/SelectContent.vue";
import SelectGroup from "@/Components/ui/select/SelectGroup.vue";
import SelectItem from "@/Components/ui/select/SelectItem.vue";
import SelectLabel from "@/Components/ui/select/SelectLabel.vue";
import SelectTrigger from "@/Components/ui/select/SelectTrigger.vue";
import SelectValue from "@/Components/ui/select/SelectValue.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";

const rental = usePage().props.rental;

const form = useForm({
    status: rental.status,
});

const submit = () => {
    form.post(route("rentals.update", rental.id));
};

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <AdminLayout>
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-8">
                <div
                    class="flex flex-wrap items-center justify-start gap-4 mb-6"
                >
                    <button
                        @click="goBack"
                        class="px-4 py-2 text-sm font-medium bg-gray-100 hover:bg-gray-200 rounded-md transition-colors"
                    >
                        ← Go Back
                    </button>
                    <h1 class="text-2xl font-bold">Update Rental Status</h1>
                </div>
                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <label class="block mb-2 font-medium"> Status </label>

                        <Select v-model="form.status">
                            <SelectTrigger class="w-full">
                                <SelectValue placeholder="Select Status" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Status</SelectLabel>
                                    <SelectItem value="ongoing">
                                        Ongoing
                                    </SelectItem>
                                    <SelectItem value="completed">
                                        Completed
                                    </SelectItem>
                                    <SelectItem value="cancelled">
                                        Cancelled
                                    </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>

                        <p
                            class="text-red-500 text-sm mt-2"
                            v-if="form.errors.status"
                        >
                            {{ form.errors.status }}
                        </p>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="bg-black text-white px-5 py-3 rounded-lg disabled:opacity-50"
                    >
                        {{ form.processing ? "Updating..." : "Update Status" }}
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
