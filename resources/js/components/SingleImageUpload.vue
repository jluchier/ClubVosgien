<template>
    <div>
        <div>
            <input type="file" id="imageInput" ref="files" accept="image/*" v-on:change="handleFilesUpload()"/>
        </div>
        <div class="files-container">
            <img ref="image" alt="uploadImage" v-on:click.prevent="addFile()" class="w3-button" v-bind:src="source"/>
        </div>

        <input type="hidden" :id="name" :name="name" ref="outputValue" value="">
    </div>
</template>

<script>
    export default {
        props: {
            name: {type: String, required: true},
            source: {type: String}
        },
        methods: {
            addFile(){
                this.$refs.files.click();
            },
            handleFilesUpload(){
                let image = this.$refs.files.files[0];

                if ( /\.(jpe?g|png|gif)$/i.test( image.name ) ) {
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
                        let ctx = c.getContext("2d");
                        ctx.drawImage(img,0,0,w,h);

                        let data = c.toDataURL("image/jpeg");

                        this.$refs.image.src = data;
                        this.$refs.outputValue.value = data;

                    }.bind(this);
                    img.src = e.target.result;
                }.bind(this);
                reader.readAsDataURL(image);
            }
            }
        },
    }
</script>