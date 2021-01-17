<template>
<div>

    <ul class="flex flex-wrap justify-center">
        <li class="border bordes2 border-gray-800 px-3 py-3 mb-3 mr-4"
         v-for=" (habilidades,i) in this.habilidades" v-bind:key="i"
         @click="activar($event)"
         >{{habilidades}}</li>

    </ul>
    <input type="hidden" name="habilidades" id="habilidades">
</div>
</template>

<script>
export default {
    props:['habilidades'],
    mounted(){
    },
    data:function(){
        return {
            skills: new Set()
        }
    },
    methods:{
        activar(e){
            if(e.target.classList.contains('bg-green-400')){
                 e.target.classList.remove('bg-green-400');
                 this.skills.delete(e.target.textContent);
                 const stringHabilidades = [...this.skills];
                 document.querySelector('#habilidades').value= stringHabilidades;
            }else{

                e.target.classList.add('bg-green-400');
                this.skills.add(e.target.textContent);
                const stringHabilidades = [...this.skills];
                document.querySelector('#habilidades').value= stringHabilidades;
            }
        }
    }
}
</script>
