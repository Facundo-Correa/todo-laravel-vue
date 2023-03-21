<template>
    <div>
        <div id="title">
            <h1 class="text-3xl font-extrabold p-4">ToDo-Laravel11-Vue3-Vite</h1>
        </div>
        <div class="mt-2">
            <div id="input">
                <imput  />
            </div>
        </div>
    </div>
</template>

<script>
import imput from '../components/input.vue';

export default{
    components: {imput}
}
</script>