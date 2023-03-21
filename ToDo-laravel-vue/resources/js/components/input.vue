<template>
    <div>
        <div>
            <input 
                @keydown.enter="put()"
                id="idInput"
                @keyup.enter="load()"
                class="text-white focus:shadow-lg focus:shadow-blue-800 pl-12 w-full py-4 bg-gray-700 rounded-xl outline-none hover:shadow-blue-800 shadow-lg transition-all duration-300 ease-in"
                placeholder="What's next?" />
        </div>
        <div class="mt-6">
            <list
            :datos="datos"
            @load="load()"></list>
        </div>
    </div>
</template>

<script>

import list from '../components/list.vue';
    export default{
    name: "input",
    components: {list},
    data() {
        return {
            dataInput: "",
            datos:[]
        };
    },
    methods: {
        put() {
            let e = document.getElementById("idInput");
            if (e.value != "") {
                axios.post("api/input/" + e.value);
                e.value = "";
            }
        },
        load() {
            axios.get('api/getData')
            .then((res) => {
                this.datos = res.data;
            })
        }
    },
    mounted(){
            axios.get('api/getData')
            .then((res) => {
                this.datos = res.data;
            })
        }
}
</script>