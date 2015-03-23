<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>Enter Pin</legend>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="Pin">Pin</label>
            <div class="controls">
                <input id="Pin" name="Pin" type="text" placeholder="#####" class="input-xlarge" required="">
                <p class="help-block">pin sent to ****<?php echo substr($_SESSION['mobile'], -4); ?></p>
            </div>
        </div>

        <!-- Button -->
        <div class="control-group">
            <label class="control-label" for="Submit"></label>
            <div class="controls">
                <button id="Submit" name="Submit" class="btn btn-primary">Log in</button>
            </div>
        </div>

    </fieldset>
</form>
