<template>
    <div class="image-upload">
        <div class="card-header">
            <h3>{{ title }}</h3>
        </div>
        <div class="card-body">
            <div class="form upload-media container">
                <form :action="url" method="post" enctype="multipart/form-data" class="row">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" :name="id_label" :value="id">

                    <div class="form-group col-xs-12 col-md-6">
                        <label>Name</label>
                        <input type="text" name="name">
                    </div>

                    <div class="form-group col-xs-12 col-md-6">
                        <label>Alternativer Text</label>
                        <input type="text" name="alt">
                    </div>

                    <div class="form-group col-xs-12 col-md-6">
                        <label>Untertitel</label>
                        <input type="text" name="undertitle">
                    </div>
                    
                    <div class="form-group margin-sm full-width file-field input-field">
                        <div class="btn btn-secondary">
                            <span>Foto hochladen</span>
                            <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="form-group margin-sm full-width">
                        <input type="submit" value="speichern" class="btn btn-primary full-width">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'imageUpload',
        props: ['url', 'id_label', 'id', 'lang', 'title'],
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),
        mounted() {
            console.log('ImageUpload Component mounted.');
            console.log(this.csrf);
        }
    }
</script>
