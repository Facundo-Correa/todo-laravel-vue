<template>
    <div class="text-white flex flex-col focus:shadow-lg focus:shadow-blue-800 justify-between pl-12 w-full py-4 bg-gray-700 rounded-xl outline-none hover:shadow-blue-800 shadow-lg transition-all duration-300 ease-in" @keyup.escape = "close()">
        <div v-for="datos in datos" class="m-1 flex flex-row bg-gray-700 border-b border-solid border-gray-600 w-90">
            <div class="w-80 flex overflow-x-hidden flex-row">
                <div>{{ datos.texto }}</div>
            </div>
            <div>
                <button @click="edi(datos)" class="bg-green-700 hover:bg-green-800 text-white font-bold h-6 w-6 mr-2 rounded">
                    <font-awesome-icon icon="fa-regular fa-pen-to-square" />
                </button>
            </div>
            <div class="flex justify-center align-middle">
                <button @click="dele(datos)" class="bg-blue-700 hover:bg-blue-800 text-white font-bold h-6 w-6 mr-2 rounded">
                    <font-awesome-icon icon="fa-regular fa-rectangle-xmark" />
                </button>
            </div>
        </div>
        <!-- --------- -->
        <input type="text" class="text-white inset-0
        mt-4
        w-80
        flex
        items-center
        justify-center
        bg-gray-600 bg-opacity-50 focus:shadow-lg pl-3 py-4 rounded-xl outline-none"
        :value="inputValue"
        placeholder="Edit Task?"
        id="inputEdit"
        v-show="showInput"
        @keydown.enter="inputEdit()"
        >
        <!-- --------- -->
    </div>
</template>

<script>
    export default {
        name: 'list',
        data(){
            return{
                showEdit: false,
                showInput: false,
                inputValue:'',
                idEdit:'',
            }
        },
        props:['datos'],
        methods:{
            edi(e){
                this.showInput = true;
                this.inputValue = e.texto;
                this.idEdit = e.id;
            },
            dele(e){
                axios.post('api/deleteData/'+e.id);
                //emite al componente padre el mensaje "load" para que ejecute el @load
                this.$emit('load');
            },
            inputEdit(){
                let e = document.getElementById("inputEdit");
                // console.log(e.value);
                if(e.value != ''){
                    let env = {
                        text : e.value,
                        id : this.idEdit
                    }
                    axios.post('api/editData', env);
                    this.showInput = false;
                    this.$emit('load');
                    e.value = "";
                }
            },
            close(){
                this.showInput = false;
            }
        }
    }
</script>