<template>
    <div>
        <div class="alert alert-success" v-if="saved">
            <strong>Success!</strong> Your signature has been saved successfully.
        </div>

        <div class="well well-sm" id="signature-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Sign the Guestbook</legend>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-9" :class="{'has-error': errors.name}">
                            <input type="text" id="name" class="form-control" v-model="signature.name" placeholder="Your Name">
                            <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email Address</label>
                        <div class="col-md-9" :class="{'has-error': errors.email}">
                            <input type="text" id="email" class="form-control" v-model="signature.email" placeholder="Your Email Address">
                            <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-md-3 control-label">Message</label>
                        <div class="col-md-9" :class="{'has-error': errors.body}">
                            <textarea name="" id="body" cols="30" rows="10" class="form-control" v-model="signature.body" placeholder="Your Message Here"></textarea>
                            <span v-if="errors.body" class="help-block text-danger">{{ errors.body[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    
    data() {
        return{
            errors: [],
            saved: false,
            signature: {
                name: null,
                email: null,
                body: null
            }
        };
    },

    methods: {
        onSubmit() {
            this.saved = false;

            axios.post('api/signatures', this.signature)
                .then(({data}) => this.setSuccessMessage())
                .catch(({response}) => this.setErrors(response));
        },

        setErrors(response) {
            this.errors = response.data.errors;
        },

        setSuccessMessage() {
            this.reset();
            this.saved = true;
        },

        reset() {
            this.errors = [];
            this.signature = {name: null, email: null, body: null};
        }
    }
}
</script>
