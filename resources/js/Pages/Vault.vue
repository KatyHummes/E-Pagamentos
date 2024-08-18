<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from 'laravel-precognition-vue-inertia';
import InputNumber from 'primevue/inputnumber';
import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import Button from 'primevue/button';
import RadioButton from 'primevue/radiobutton';

const form = useForm('post', route('store.vault'), {
    name: '',
    vault: null,
});

const submit = () => {
    console.log("Submit chamado");
    form.submit({
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });

}



</script>

<template>
    <AppLayout title="cofrinho">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <form @submit.prevent="submit">
                        <h3 class="text-xl font-semibold text-[var(--text-color)] ">
                            Criar Cofrinho
                        </h3>
                        <div class="grid grid-cols-2 gap-4 mt-8">
                            <FloatLabel>
                                <InputText id="name" v-model="form.name" fluid />
                                <label for="name">Nome do Cofrinho</label>
                            </FloatLabel>

                            <FloatLabel>
                                <InputNumber id="value" v-model="form.vault" inputId="minmaxfraction"
                                    :minFractionDigits="2" :maxFractionDigits="8" fluid />
                                <label for="value">Adicionar Valor</label>
                            </FloatLabel>
                        </div>

                        <div  class="mt-4 flex justify-end">
                            <Button type="submit" label="Salvar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
