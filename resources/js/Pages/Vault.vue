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
    value: null,
    number: null,
    time: null,
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
                        <div  class="mt-16">
                            <h1>Planeje seu Cofrinho</h1>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                
                                <div class="m-x">
                                    <span>Qual valor você quer juntar no total?</span>

                                    <InputNumber id="value" v-model="form.value" inputId="minmaxfraction"
                                        :minFractionDigits="2" :maxFractionDigits="8" mode="currency" currency="BRL"
                                        fluid />
                                </div>
                                <div>
                                    <h3>E em quanto tempo você quer atingiresse objetivo</h3>
                                    <InputNumber v-model="form.number" inputId="minmax-buttons" mode="decimal" showButtons
                                        :min="1" :max="100" fluid />

                                    <div class="flex flex-wrap gap-4">
                                        <div class="flex items-center">
                                            <RadioButton v-model="form.time" inputId="month" name="time" value="m" />
                                            <label for="month" class="ml-2">Meses</label>
                                        </div>
                                        <div class="flex items-center">
                                            <RadioButton v-model="form.time" inputId="yers" name="time" value="y" />
                                            <label for="yers" class="ml-2">Anos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
