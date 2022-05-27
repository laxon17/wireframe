<?php

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=biography.docx");
    
    $biography_string = 
    "
        <table>
            <thead>
                <tr>
                    <th><b>Lazar Lalovic</b> 62/20</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Hello, my name is Lazar Lalović. I am 22 years old. 
                </td>
            </tr>
                <tr>
                    <td>
                        I was born in Zvornik and raised in a small town called Milići, Serbian Republic. 
                        Now, I am a second-year student at: \"College of Vocational Studies for Information and Communication Technologies\", 
                        where I am majoring in Web programming. 
                        If you want to learn more about me, visit my <a href=\"https://laxon17.github.io/portfolio/\"> portfolio</a>!
                    </td>
                </tr>
            </tbody>
        </table>
    ";
    
    echo $biography_string;

    