<template>
  <div class="modal-container">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  @click="$emit('cerrarModal')"
                >
                  <span aria-hidden="true" @click="showModal = false">&times;</span>
                </button>
              </div>
              <div class="modal-body table-container table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Hora entrada</th>
                      <th scope="col">Motivo entrada</th>
                      <th scope="col">Ip entrada</th>
                      <th scope="col">Hora salida</th>
                      <th scope="col">Motivo salida</th>
                      <th scope="col">Ip salida</th>
                    </tr>
                  </thead>
                  <tbody v-for="dato in datosUsuario" :key="dato.id">
                    <tr>
                      <th scope="row">{{dato.id}}</th>
                      <td>{{convertirFecha(dato.created_at)}}</td>
                      <td>{{dato.visado_entrada.fecha_entrada}}</td>
                      <td>{{dato.visado_entrada.motivo_entrada}}</td>
                      <td>{{dato.visado_entrada.ip_entrada}}</td>
                      <td v-if="dato.visado_salida !=null">{{dato.visado_salida.fecha_salida}}</td>
                      <td v-if="dato.visado_salida !=null">{{dato.visado_salida.motivo_salida}}</td>
                      <td v-if="dato.visado_salida !=null">{{dato.visado_salida.ip_salida}}</td>  
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="$emit('cerrarModal')">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: ["usuarioId"],
  data() {
    return {
      datosUsuario: []
    };
  },
  created() {
    console.log("hola");
    this.getDataUser(this.usuarioId);
  },
  methods: {
    getDataUser(id) {
      axios
        .get(`/api/administracion/${id}`)
        .then(res => (this.datosUsuario = res.data));
    },
    convertirFechaEnHoras(date) {
      let fecha = new Date(date);
      return `${fecha.getHours()}:${fecha.getMinutes()}`;
    },
    convertirFecha(date) {
      let fecha = new Date(date);
      return `${fecha.getDay()}/${fecha.getMonth()}/${fecha.getFullYear()}`;
    }
  }
};
</script>

<style lang="scss" scoped>
.table-container{
  height: 50vh;
}
.modal-container {
  position: fixed;
  top: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba($color: #000000, $alpha: 0.5);
  z-index: 10;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>