<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../public/script/tailwind.config.js"></script>
</head>

<body>
    <div class="bg-[#50505060] h-full w-full  text-[#ADADAD]">
        <div id=""
            class="bg-[#2E2E2E] inset-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max w-11/12 max-w-3xl p-4 rounded shadow-lg ">

            <button id="close" class="bg-[#C4975E] rounded w-8 h-8  absolute -top-4 -right-4">
                &times;
            </button>
            <div>
                <table id="table" class="border-separate border-spacing-2 w-full">
                    <tr>

                        <?php if(isset($items[0])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[0]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                        ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md rounded w-[185px] h-[185px]">
                            </th>
                        <?php }  ?>
                       


                        <?php if(isset($items[1])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[1]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md rounded w-[185px] h-[185px]">
                        </th>
                        <?php } ?>

                        <?php if(isset($items[2])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[2]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>





                        <?php if(isset($items[3])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[3]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>


                    </tr>
                    <tr>
                    <?php if(isset($items[4])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[4]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>


                        <?php if(isset($items[5])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[5]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>


                        <?php if(isset($items[6])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[6]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>


                        <?php if(isset($items[7])){?>
                        <th
                            class="hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded w-[185px] h-[185px]">
                            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$items[7]['image']?>" class="object-cover w-full h-full rounded">
                        </th>
                        <?php 
                        } else{ 
                            ?>
                            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px] ">
                        </th>
                        <?php } ?>


                    </tr>
                </table>
            </div>


            <div class="text-xs flex justify-between ">
                <p>Capacité: <?php 
                $nbItems = count($items);
                echo ($nbItems/8)*100 . "%";
                ?></p>
                <p>Items: <?php echo $nbItems ?>/8</p>
            </div>
        </div>




</body>

</html>