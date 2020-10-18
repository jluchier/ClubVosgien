<template>
    <div class="preview w3-display-container">
        <img v-bind:ref="'image'" alt="Chargement Image" style="width: 100%" src="/images/common/loading.webp"/>
        <div class="w3-display-bottomleft progress w3-text-pale-green w3-opacity-min" v-if="upload" :style="progressStyle">
            {{ progress }}%
        </div>
        <button class="w3-display-bottomright w3-button" v-else @click.prevent="removeFile()"><i class="fas fa-trash-alt"></i></button>
    </div>
</template>

<script>
    export default {
        props: {
            file: {type: File, required: true},
            id: {type: Number, required: true}
        },
        data () {
            return {
                progress: 0,
                upload: false,
                progressStyle: {
                    width: "0%"
                }
            }
        },
        methods: {
            send(route) {
                this.upload = true;
                let formData = new FormData();
                formData.append("image", this.$refs.image.src);
                this.$axios.post(route,
                    formData,
                    {
                        headers: { 'Content-Type': 'multipart/form-data' },
                        onUploadProgress: function (progressEvent) {
                            this.progress = Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 );
                            this.progressStyle.width = this.progress + "%";
                        }.bind(this)
                    })
                    .then(resp => {
                        this.$emit("done");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            removeFile()
            {
                this.$emit("removeFile", this.id);
            },
        },
        mounted() {
            this.$parent.$on("send", this.send);
            if ( /\.(jpe?g|png|gif)$/i.test( this.file.name ) ) {
                let reader = new FileReader();
                reader.onloadend = function (e) {
                    let img = new Image();
                    img.onload = function()
                    {
                        let MAXWidthHeight=1920;
                        let r=MAXWidthHeight/Math.max(img.width,img.height),
                            w=Math.round(img.width*r),
                            h=Math.round(img.height*r),
                            c=document.createElement("canvas");
                        c.width=w;c.height=h;
                        c.getContext("2d").drawImage(img,0,0,w,h);
                        this.$refs.image.src = c.toDataURL("image/jpeg");
                    }.bind(this);
                    img.src = e.target.result;
                }.bind(this);
                reader.readAsDataURL(this.file);
            }
        },
        destroyed() {
            this.$parent.$off("send", this.send);
        }
    }
</script>