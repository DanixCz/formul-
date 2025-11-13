<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="/images/DGS.svg" type="image/svg+xml">
    <link href="style/style.css" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
    <div class="fade-overlay"></div>

    <a href="/auth/login?" class="back-link"><i class="fa-solid fa-arrow-left"></i>Back to Login</a>

    <div class="login-card">
        <div class="login-header">
            <img src="/images/apexlogo.png" alt="Logo" class="dgs-logo" style="margin: 0 auto 1rem;">
            <h1 class="login-title">Create an account</h1>
        </div>

        
        <form action="/auth/register" id="registerForm" method="post">
            <input name="utf8" type="hidden" value="&#x2713;" />
            <input type="hidden" name="authenticity_token" value="h0E6/Ix+f49HKu5t77Vua0zAPxLEFcMnxD4oGApmpZ95a2vwf1AG0SaVS78KBRZaQ0ADctWhuh7vssxAhehJ1g==" />

            <div class="login-form-group">
                <label for="username" class="login-label"><i class="fa-solid fa-user"></i>Username</label>
                <input type="text" class="login-input" id="username" name="username" placeholder="Username (alphanumeric only)" required autocomplete="username" pattern="[a-zA-Z0-9]+" value="">
            </div>

            <div class="login-form-group">
                <label for="password" class="login-label"><i class="fa-solid fa-lock"></i>Password</label>
                <input type="password" class="login-input" id="password" name="password" placeholder="Enter your password (min 6 characters)" required autocomplete="new-password">
            </div>

            <div class="login-form-group">
                <label for="password2" class="login-label"><i class="fa-solid fa-lock"></i>Confirm Password</label>
                <input type="password" class="login-input" id="password2" name="password2" placeholder="Confirm your password" required autocomplete="new-password">
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="tos" name="tos" required>
                <label for="tos">I agree with <a href="/privacy-policy.php" target="_blank">terms of service and privacy policy</a></label>
            </div>

            <div class="login-form-group" style="display: flex; justify-content: center; margin: 1rem 0;">
                <div class="cf-turnstile" data-sitekey="0x4AAAAAAAi2s2jBCPHLeHq0" data-callback="onTurnstileSuccess"></div>
            </div>

            <button type="submit" name="commit" value="Submit" class="login-button" id="submitButton" disabled><i class="fa-solid fa-user-plus"></i>Create account</button>
        </form>
        <div class="login-footer">
            <div class="login-footer-grid single-card">
                
                <a href="/auth/login" class="login-footer-card">
                    <span class="login-footer-text">Already have an account?</span>
                    <span class="login-footer-link-text">Sign in</span>
                </a>
            </div>
        </div>
    </div>
</div>

</html>