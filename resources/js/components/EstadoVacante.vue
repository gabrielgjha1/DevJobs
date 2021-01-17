

<template>
        <!-- <span class="px-2 inline-flex text-xs leading-5 {{$vacante->activa ? '' : ''}}  font-semibold rounded-full">
            {{   $vacante->activa ? 'Activo' : 'Terminado'    }}
        </span> -->
        <span :class="claseVacante()" :key="estadoVacanteData" @click="CanbuarEstado" class="px-2 text-white inline-flex text-xs leading-5  font-semibold rounded-full">
            {{estadoVacante}}
        </span>

</template>
<script>
export default {
    props:['estado','vacanteId'],
    mounted(){
        // console.log(this.vacanteId);
        this.estadoVacanteData = Number(this.estad);
    },
    data:function(){
        return{
            estadoVacanteData:null
        }
    },
    methods: {
        claseVacante(){

            return this.estadoVacanteData === 0 ? "bg-red-500 text-red-500" :  "bg-green-500 text-green-500";

        },
        CanbuarEstado(){
            if (this.estadoVacanteData===0){
               this.estadoVacanteData=1;
            }else{
                this.estadoVacanteData=0;
            }
            const params = {

                estado:this.estadoVacanteData

            }
            axios.post('/vacantes/'+this.vacanteId,params)
                .then(respuesta=>console.log(respuesta))
                .catch(error=>console.log(error))

        }
    },
    computed:{
        estadoVacante(){
            return this.estadoVacanteData===0 ? "Inactiva":"Activa"
        }
    }


}
</script>
