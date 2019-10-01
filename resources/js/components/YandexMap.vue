
<template>
<div>

<h4 style=" margin-top: 50px; ">Расположение</h4>
    <yandex-map
        style="height: 300px;"
        :center="center"
        :coords="coords"
        :behaviors="['drag', 'multiTouch', 'rightMouseButtonMagnifier', 'scrollZoom']"
        :zoom="16"
        :id="map"
        v-on:click="onDblClick"
    >
        <ymap-marker
            :coords="coords"
            marker-id="3"
        />
    </yandex-map>

    <input style="display: none" type="text" id="coordsLongitude" v-model="coords[0]" name="coordsLongitude" class="form-control coords-forms" >
    <input style="display: none" type="text" id="coordsLatitude" v-model="coords[1]" name="coordsLatitude" class="form-control coords-forms"  >
</div>

</template>

<script>
    import Swal from "sweetalert2";

    import { yandexMap, ymapMarker } from 'vue-yandex-maps'
    export default {

        components: { yandexMap, ymapMarker },
        data: () => ({
            map: '',
            coords: [],
            center: [],
            clicks: 0,

        }),
        methods: {


            onDblClick: function(e) {
                if (this.clicks === 0) {
                    this.clicks ++;

                } else if (this.clicks === 1) {

                    if (isAdmin === true) {
                    this.coords = e.get('coords');
                    this.clicks ++;

                    axios.post('/news/' + document.getElementById('newsid').innerHTML + '/coords/store', {
                        address_longitude: this.coords[0],
                        address_latitude: this.coords[1],
                    })
                        .then(response => {
                        console.log(response);
                            Swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Метка была успешно перемещена',
                                showConfirmButton: false,
                                timer: 1500
                            });

                    })
                        .catch(error => {
                    });


                    }
                } else  {
                    this.clicks = 0;
                    this.clicks ++;
                }

            }


        },
        mounted() {

        },
        beforeCreate() {
            window.axios.get('/api/news/' + document.getElementById('newsid').innerHTML)
                .then(response => {
                    let long = response.data[0].address_longitude;
                    let lat = response.data[0].address_latitude;
                    if (lat == null && long == null || lat === undefined || long === undefined ) {
                        this.coords = [54.72405461, 55.94686377];
                        this.center = [54.72405461, 55.94686377];
                    } else {
                        this.coords = [long, lat];
                        this.center = [long, lat];
                    }
                    console.log(this.coords);
                    console.log(this.center);
                });

        },


    }
</script>

<style scoped>

</style>
