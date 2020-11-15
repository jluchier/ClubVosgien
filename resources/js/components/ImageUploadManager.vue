<template>
    <form v-on:submit.prevent="submitForm" ref="form">

        <p v-for="error in errors">{{ error }}</p>

        <div>
            <input type="file" id="files" ref="files" accept="image/*" multiple v-on:change="handleFilesUpload()"/>
        </div>
        <div class="files-container">
            <ImageSingle v-for="(file, key) in files" :key="file.index" :id="key" :file="file.image" v-on:done="finished" v-on:removeFile="removeFile"></ImageSingle>
        </div>

        <p>{{ Progress }}</p>
        <button v-on:click.prevent="addFiles()" class="w3-button w3-round w3-blue-gray">Ajouter des images</button>

        <slot></slot>

        <input type="submit" class="w3-button w3-round w3-green" value="Sauvegarder">
    </form>
</template>

<script>
    import ImageSingle from "./ImageSingle";
    export default {
        props: {
            route: {type: String, required: true},
            method: {type: String, required: true},
            uploadRoute: {type: String, required: true},
            userId: {type: Number, required: true},
            redirectRoute: {type: String, required: true},
        },
        data(){
            return {
                files: [],
                uploadDone: 0,
                currentIndex: 0,
                errors: [],
            }
        },
        methods: {
            addFiles(){
                this.$refs.files.click();
            },
            removeFile( key ){
                this.files.splice( key, 1 );
            },
            submitForm()
            {
                let elements = this.$refs.form.elements;
                let config = {
                    method: this.method,
                    url: this.route,
                    data: {},
                    headers: {
                        "Accept": "application/json"
                    }
                };

                for (let i = 0; i < elements.length; ++i)
                {
                    let element = elements[i];

                    if (element.type !== "submit" && element.type !== "file")
                    {
                        if (element.type === "checkbox")
                        {
                            config.data[element.id] = element.checked;
                        }
                        else
                        {
                            config.data[element.id] = element.value;
                        }
                    }
                }
                config.data["user_id"] = this.userId;

                this.$axios.request(config)
                    .then(res => {

                        let emitConfig = {
                            method: "post",
                            url: this.uploadRoute,
                            data: {},
                            headers: {
                                "Accept": "application/json"
                            }
                        };
                        emitConfig.data["folder"] = res.data.folder;

                        if (this.files.length === 0)
                        {
                            location.href = this.redirectRoute;
                        }

                        this.$emit("send", emitConfig);
                    })
                    .catch(error => {
                        if (error.response)
                        {
                            for( let key in error.response.data.errors)
                            {
                                this.errors = this.errors.concat(error.response.data.errors[key]);
                            }
                        }
                    });
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
                    location.href = this.redirectRoute;
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
