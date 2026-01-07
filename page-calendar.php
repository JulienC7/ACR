<?php

/**
 * Template Name: Calendar
 * Description: A page template to display a simple calendar.
 */

get_header();
?>
<main id="primary" class="site-main">
    <section class="calendar">
        <h1>Calendrier des événements</h1>
        <?php
        // Simple placeholder calendar using HTML table. In a real scenario, you might use a shortcode or plugin.
        echo '<table>';
        echo '<thead><tr><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th><th>Dimanche</th></tr></thead>';
        echo '<tbody>';
        for ($week = 0; $week < 5; $week++) {
            echo '<tr>';
            for ($day = 1; $day <= 7; $day++) {
                $date = $week * 7 + $day;
                echo '<td>' . $date . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        ?>
    </section>
</main>
<?php
get_footer();
?>