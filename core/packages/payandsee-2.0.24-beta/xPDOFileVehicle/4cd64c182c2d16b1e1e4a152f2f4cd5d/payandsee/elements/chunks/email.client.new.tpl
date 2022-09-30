{'payandsee_body_client_new'|lexicon}<br>

{if $profile_extended.password}
    <p>Логин и пароль для входа в <a href="{'url_scheme'|option}{'http_host'|option}{'manager_url'|option}">админку</a>:
        <br>
        <strong>Username:</strong> {$user_username}<br/>
        <strong>Password:</strong> {$profile_extended.password}<br/>
    </p>
{/if}
