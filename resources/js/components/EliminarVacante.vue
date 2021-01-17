<template>
<button @click="EliminarVacante()" href="#" class="text-red-600 hover:text-red-900  mr-5">Eliminar</button>
</template>

<script>
export default {
    props:['vacanteId'],
    methods:{
        EliminarVacante(){
            this.$swal.fire({
                title: 'Deseas eliminada esta vacante?',
                text: "Esto no se puede revertir    !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar'
            }).then((result) => {
            if (result.isConfirmed) {

                const params= {
                    id:this.vacanteId,
                    _method: 'delete'
                }

                axios.post('/vacantes/'+this.vacanteId,params)
                .then((respuesta)=>{
                      this.$swal.fire(
                        'Eliminado!',
                        'Su archivo a  sido eliminado.',
                        'success'
                        )

                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                })
                .catch((error)=>{
                    console.log(error);

                })

            }
            })

        }
    }
}
</script>
