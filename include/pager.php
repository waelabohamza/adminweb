<div class="my-pager">
                        <a href="?pager=<?= $prevpage;  ?>" class="pager-style <?php if ($currentpage <= 1) {
                                                                                    echo 'false-href disabled-pointer';
                                                                                } ?>"><i class="fa  fa-step-backward" aria-hidden="true"></i></a>
                        <a href="?pager=<?= $prevpage - 1;  ?>" class="pager-style <?php if ($currentpage <= 2) {
                                                                                        echo 'false-href disabled-pointer';
                                                                                    } ?>"><i class="fa   fa-fast-backward" aria-hidden="true"></i></a>
                        <form style="display:inline" action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
                            الصفحة <input type="text" name="pager" class="pagerajax-input" value="<?= $currentpage ?>" /> من <span><?php echo $lastpage; ?></span>
                            <button class="pager-style"><i class="fa fa-refresh"></i></button>
                        </form>
                        <a href="?pager=<?= $nextpage + 1;  ?>" class="pager-style <?php if ($currentpage >= ($lastpage - 1)) {
                                                                                        echo 'false-href disabled-pointer';
                                                                                    } ?>"><i class="fa fa-fast-forward" aria-hidden="true"></i></a>
                        <a href="?pager=<?= $nextpage;  ?>" class="pager-style <?php if ($currentpage >= $lastpage) {
                                                                                    echo 'false-href disabled-pointer';
                                                                                } ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
                    </div>