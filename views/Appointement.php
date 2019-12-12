<?php
define('PREAMBLE', '../');
include(PREAMBLE.'inc/head.php');?>

<h3>Form</h3>
<form method="post" action="#">
    <div class="row gtr-uniform">
        <div class="col-6 col-12-xsmall">
            <input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
        </div>
        <div class="col-6 col-12-xsmall">
            <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
        </div>
        <!-- Break -->
        <div class="col-12">
            <select name="demo-category" id="demo-category">
                <option value="">- Select -</option>
                <option value="alpha">Option alpha</option>
                <option value="beta">Option beta</option>
                <option value="gamma">Option gamma</option>
                <option value="delta">Option delta</option>
                <option value="epsilon">Option epsilon</option>
                <option value="zeta">Option zeta</option>
                <option value="eta">Option eta</option>
                <option value="theta">Option theta</option>
            </select>
        </div>
        <!-- Break -->
        <div class="col-4 col-12-small">
            <input type="radio" id="demo-radio-alpha" name="demo-radio" checked>
            <label for="demo-radio-alpha">Radio alpha</label>
        </div>
        <div class="col-4 col-12-small">
            <input type="radio" id="demo-radio-beta" name="demo-radio">
            <label for="demo-radio-beta">Radio beta</label>
        </div>
        <div class="col-4 col-12-small">
            <input type="radio" id="demo-radio-gamma" name="demo-radio">
            <label for="demo-radio-gamma">Radio gamma</label>
        </div>
        <!-- Break -->
        <div class="col-6 col-12-small">
            <input type="checkbox" id="demo-checkbox-alpha" name="demo-checkbox">
            <label for="demo-checkbox-alpha">Checkbox alpha</label>
        </div>
        <div class="col-6 col-12-small">
            <input type="checkbox" id="demo-checkbox-beta" name="demo-checkbox" checked>
            <label for="demo-checkbox-beta">Checkbox beta</label>
        </div>
        <!-- Break -->
        <div class="col-12">
            <textarea name="demo-textarea" id="demo-textarea" placeholder="Alpha beta gamma delta" rows="6"></textarea>
        </div>
        <!-- Break -->
        <div class="col-12">
            <ul class="actions">
                <li><input type="submit" value="Submit Form" class="primary" /></li>
                <li><input type="reset" value="Reset" /></li>
            </ul>
        </div>
    </div>
</form>
