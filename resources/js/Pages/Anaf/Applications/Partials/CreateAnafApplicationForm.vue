<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    clientId: '',
    clientSecret: '',
});

const createAnafApplication = () => {
    form.post(route('teams.store'), {
        errorBag: 'createAnafApplication',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="createAnafApplication">
        <template #title>
            Application Details
        </template>

        <template #description>
            Create a new team to collaborate with others on projects.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="clientId" value="Client Id" />
                <TextInput
                    id="clientId"
                    v-model="form.clientId"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <InputError :message="form.errors.clientId" class="mt-2" />
            </div>
          <div class="col-span-6 sm:col-span-4">
            <InputLabel for="clientSecret" value="Client secret" />
            <TextInput
                id="clientId"
                v-model="form.clientSecret"
                type="text"
                class="block w-full mt-1"
                autofocus
            />
            <InputError :message="form.errors.clientSecret" class="mt-2" />
          </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </PrimaryButton>
        </template>
    </FormSection>
</template>
