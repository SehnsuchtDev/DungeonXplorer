<!DOCTYPE html>

<!-- Page 1 for any chapter -->

<div class="pagediv bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">

    <div class="p-6 font-['Pirata_One'] justify-items-center text-center">
        <p class="text-black font-bold text-4xl m-8">CHAPITRE <?= $chapterId ?></p>

        <?php
        if (isset($content)) {
            $text_size = strlen($content);
            if ($text_size > 880) {
                $text_class = 'text-sm';
            } else {
                $text_class = 'text-2l';
            }
        }
        ?>

        <p class="font-['Roboto'] <?= $text_class ?> text-justify">
            <?= $content ?>
        </p>
    </div>

</div>