<h4 class="mb-3">Add or deactivate surveys</h4>
<div class="row">
    <button id="addQuestion" class="btn blue lighten-1">
        <i class="material-icons">add</i> 
    </button>
    <form action="/dashboard/add_survey" method="POST">
        <div id="addQuestionField" class="input-field col l6 right <?= empty($_GET['error']) ? 'hide' : '' ?>">
            <input id="addQuestionInput" name="add_question" type="text" />
            <label for="addQuestionInput">Ask them something</label>
            <button type="submit" class="btn blue lighten-1">
                <i class="material-icons">add</i>
            </button>
        </div>
    </form>
</div>

<table class="highlight striped centered">
    <thead>
        <tr>
            <td class="center">SurveyId</td>
            <td class="center">Question</td>
            <td class="center">IsActive</td>
        </tr>
    </thead>
    <tbody>
        <?php if(empty($surveys)) : ?>
            <tr>
                <td colspan="3">No surveys found!</td>
            </tr>
        <?php else : ?>
            <?php foreach($surveys as $survey) : ?>
                <?php $answers = $database->selectPollAnswers($survey->PollId) ?>

                <tr>
                    <td><?= $survey->PollId ?></td>
                    <td>
                        <?= $survey->Question ?>
                        -
                        <?php foreach($answers as $answer) : ?>
                            <?= $answer->Answer . ' - ' . $answer->Result ?>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php if($survey->IsActive) : ?>
                            <i class="white deactivate-survey material-icons green-text">check</i>
                        <?php else : ?>
                            <i class="material-icons red-text">close</i>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>