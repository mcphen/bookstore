<template>
    <div class="col-md-6">
            <div class="heading">
                <h2 class="title">Inscription</h2>
                <p>Vous effectuez votre première commande sur notre site. Inscrivez votre email ci-dessous puis cliquez sur [valider]</p>
            </div><!-- End .heading -->

            <form action="#">
                <input type="text" class="form-control" placeholder="First Name" required>
                <input type="text" class="form-control" placeholder="Middle Name" required>
                <input type="text" class="form-control" placeholder="Last Name" required>

                <h2 class="title mb-2">Login information</h2>
                <input type="email" class="form-control" placeholder="Email Address" required>
                <input type="password" class="form-control" placeholder="Password" required>
                <input type="password" class="form-control" placeholder="Confirm Password" required>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="newsletter-signup">
                    <label class="custom-control-label" for="newsletter-signup">Sign up our Newsletter</label>
                </div><!-- End .custom-checkbox -->

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div><!-- End .form-footer -->
            </form>
        </div>
</template>

<script>
export default {

}
</script>

<style>

</style>