{include file="header.tpl"}
<p></p>

<p></p>
<div class="container">

<div class="alert alert-danger" role="alert">
    {$message}
</div>
       <form action="verifyUser" method="post">
                    <div class="form-group">
                        <label for="user">User</label>
                        <input class="form-control" id="user" name="input_user" aria-describedby="emailHelp">
                
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="input_pass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>
        </form>
</div>

<p></p>
{include file="footer.tpl"}