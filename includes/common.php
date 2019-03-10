<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 09/11/2018
 * Time: 22:12
 */

/**With this function, we can wrap any variable in the escape() function,
 * and the HTML entities will be protected.
 */

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}