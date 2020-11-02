<template>
    <div>
    <slot name="top"></slot>
        <div>
            <input type="file" id="files" ref="files" accept="image/*" multiple v-on:change="handleFilesUpload()"/>
        </div>
        <div class="files-container">
            <ImageSingle v-for="(file, key) in files" :key="file.index" :id="key" :file="file.image" v-on:done="finished" v-on:removeFile="removeFile"></ImageSingle>
        </div>

        <p>{{ Progress }}</p>
        <button v-on:click.prevent="addFiles()" class="w3-button w3-round w3-blue-gray">Ajouter des images</button>

        <slot name="bottom"></slot>

        <button v-on:click.prevent="submitFiles()" class="w3-button w3-round w3-green" >Envoyer</button>
    </div>
</template>

<script>
    import ImageSingle from "./ImageSingle";
    export default {
        props: {
            route: {type: String, required: true}
        },
        data(){
            return {
                files: [],
                uploadDone: 0,
                currentIndex: 0
            }
        },
        methods: {
            addFiles(){
                this.$refs.files.click();
            },
            removeFile( key ){
                this.files.splice( key, 1 );
            },
            submitFiles(){
                this.$emit("send", this.route);
            },
            handleFilesUpload(){
                let uploadedFiles = this.$refs.files.files;
                for( var i = 0; i < uploadedFiles.length; i++ ){
                    let file = {"index": this.currentIndex++, "image": uploadedFiles[i]};
                    this.files.push( file );
                }
            },
            finished(){
                ++this.uploadDone;
                if (this.uploadDone >= this.files.length)
                {
                    location.reload();
                }
            }
        },
        computed: {
            /**
             * @return {string}
             */
            Progress(){
                return this.uploadDone + "/" + this.files.length;
            }
        },
        components: { ImageSingle }
    }
</script>