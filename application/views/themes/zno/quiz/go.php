<div id="quiz-timer"></div>

<h1><?=$BC->_getPageTitle()?></h1>

<h3><?=language('progress')?>: <?=$amount_answered_questions+1?>/<?=$total_questions?></h3>

<div><?=htmlspecialchars($quiz['question']['question'])?></div>

<?if($quiz['question']['code']):?>
	<div class="code">
		<?=highlight_code($quiz['question']['code'])?>
		<div class="plast"></div>
	</div>
<?endif?>

<br />

<form id="quiz-form" class="form-inline form-horizontal" action="<?=site_url($BC->_getBaseURL().'quiz/submit/'.$quiz['quiz']['id'].'/'.$quiz['question']['id']);?>" method="post">

<?if($quiz['type']=='multi-radio'):?>
    <!-- Answers List -->
    <p>
        <?foreach ($quiz['answers'] as $aIndex=>$answer):?>
            <?=$aIndex+1?>: <?=htmlspecialchars($answer['answer'])?>
        <?endforeach;?>
    </p>
    <!-- Connected Answers List -->
    <p>
        <?foreach ($quiz['connected_answers'] as $caIndex=>$connected_answer):?>
            <?=chr(65+$caIndex)?>: <?=htmlspecialchars($connected_answer['answer'])?>
        <?endforeach;?>
    </p>
    <!-- Multi-radio Matrix -->
    <div>
        &nbsp;&nbsp;
        <?foreach ($quiz['connected_answers'] as $caIndex=>$connected_answer):?>
            &nbsp;<?=chr(65+$caIndex)?>
        <?endforeach;?>
    </div>
    <?foreach ($quiz['answers'] as $aIndex=>$answer):?>
        <div>
            <?=$aIndex+1?>
            <?foreach ($quiz['connected_answers'] as $connected_answer):?>
                <?=form_radio('answers['.$answer['id'].']',$connected_answer['id'],FALSE,"id='answer_{$answer['id']}_{$connected_answer['id']}'")?>
                <!-- <label for="answer_<?=$answer['id']?>_<?=$connected_answer['id']?>"><?=htmlspecialchars($connected_answer['answer'])?></label>-->
            <?endforeach;?>
        </div>
    <?endforeach;?>
<?else:?>
    <?foreach ($quiz['answers'] as $answer):?>
        <div>
            <?if($quiz['type']=='input'):?>
                <?=form_input('custom_answer','')?>
            <?elseif($quiz['type']=='checkbox'):?>
                <?=form_checkbox('answers['.$answer['id'].']',1,FALSE,"id='answer_{$answer['id']}'")?> <label for="answer_<?=$answer['id']?>"><?=htmlspecialchars($answer['answer'])?></label>
            <?else:?>
                <?=form_radio('answer',$answer['id'],FALSE,"id='answer_{$answer['id']}'")?> <label for="answer_<?=$answer['id']?>"><?=htmlspecialchars($answer['answer'])?></label>
            <?endif?>
        </div>
    <?endforeach;?>
<?endif;?>

<p><?=form_submit("submit",language('next'));?></p>

</form>

<script>
var time_left = <?=$quiz['question']['time']?>;
var are_you_sure = "<?=language('are_you_sure')?>";
</script>