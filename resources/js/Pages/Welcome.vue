<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link v-if="$page.props.auth.user" :href="route('cofrinho')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    cofrinho
                    </Link>
                    <template v-else>
                        <Link :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                        </Link>
                        <Link v-if="canRegister" :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                        </Link>
                    </template>
                </nav>
            </div>
        </div>
    </div>
    <!-- <div  class="mt-16">
                            <h1>Planeje seu Cofrinho</h1>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                
                                <div class="m-x">
                                    <span>Qual valor você quer juntar no total?</span>

                                    <InputNumber id="value" v-model="form.vault" inputId="minmaxfraction"
                                        :minFractionDigits="2" :maxFractionDigits="8" mode="currency" currency="BRL"
                                        fluid />
                                </div>
                                <div>
                                    <h3>E em quanto tempo você quer atingiresse objetivo</h3>
                                    <InputNumber v-model="form.value2" inputId="minmax-buttons" mode="decimal" showButtons
                                        :min="1" :max="100" fluid />

                                    <div class="flex flex-wrap gap-4">
                                        <div class="flex items-center">
                                            <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza"
                                                value="Cheese" />
                                            <label for="ingredient1" class="ml-2">Meses</label>
                                        </div>
                                        <div class="flex items-center">
                                            <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza"
                                                value="Mushroom" />
                                            <label for="ingredient2" class="ml-2">Anos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
</template>
