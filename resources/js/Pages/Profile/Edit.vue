<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import Breadcrumb from "@/Components/Breadcrumb.vue";

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>

<template>
    <Head :title="lang().label.profile" />

    <AuthenticatedLayout>
        <Breadcrumb :title="'Profile'" :breadcrumbs="[]" />

        <div class="space-y-4">
            <div
                class="p-4 sm:p-8 bg-white dark:bg-slate-800 shadow sm:rounded-lg"
            >
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl"
                />
            </div>

            <div
                class="p-4 sm:p-8 bg-white dark:bg-slate-800 shadow sm:rounded-lg"
            >
                <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div
                class="p-4 sm:p-8 bg-white dark:bg-slate-800 shadow sm:rounded-lg"
            >
                <DeleteUserForm class="max-w-xl" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
