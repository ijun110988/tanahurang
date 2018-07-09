<div class="col-md-3">
                    <h2 class="bookmarked-listing__headline">Selamat Datang, <strong><?php echo $this->session->userdata(""); ?></strong></h2>
                    <div class="settings-block">
                        <span class="settings-block__title">Manage Account</span>
                        <ul class="settings">
                            <li class="setting"><a href="<?php echo base_url('admin'); ?>" class="setting__link"><i class="ion-ios-person-outline setting__icon"></i>Profile Saya</a></li>
                            <li class="setting"><a href="#" class="setting__link"><i class="ion-ios-heart-outline setting__icon"></i>Lis Bookmart</a></li>
                        </ul><!-- settings -->
                    </div><!-- .settings-block -->

                    <div class="settings-block">
                        <span class="settings-block__title">Manage Listing</span>
                        <ul class="settings">
                            <li class="setting"><a href="#" class="setting__link"><i class="ion-ios-home-outline setting__icon"></i>Iklan saya</a></li>
                            <li class="setting"><a href="<?php echo base_url('create_product'); ?>" class="setting__link"><i class="ion-ios-upload-outline setting__icon"></i>Buat Iklan Baru</a></li>
                         </ul><!-- settings -->
                    </div><!-- .settings-block -->

                    <div class="settings-block">
                        <ul class="settings">
                            <li class="setting"><a href="#" class="setting__link"><i class="ion-ios-unlocked-outline setting__icon"></i>Rubah Password</a></li>
                            <li class="setting"><a href="<?php echo base_url('login/logout') ?>" class="setting__link"><i class="ion-ios-undo-outline setting__icon"></i>Log Out</a></li>
                        </ul><!-- settings -->
                    </div><!-- .settings-block -->
                </div>