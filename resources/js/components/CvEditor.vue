<template>
        <ckeditor tag-name="textarea" name="content" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    import '@ckeditor/ckeditor5-build-classic/build/translations/fr';

    export default {
        name: 'app',
        props: {
            editorData: {type: String, required: true}
        },
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'undo', 'redo' ],
                    language: 'fr'
                }
            };
        },

        mounted() {
          console.log(this.editor);
          // Array.from( this.editor.ui.componentFactory.names() );
        }
    }
</script>
