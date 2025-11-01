 <ul class="nav nav-tabs">
                    <div class="filter-dropdowns" style="display:flex;gap:20px;">
                        <div class="dropdown">
                            <button class="btn btn-outline-myself dropdown-toggle" type="button" id="dropdownMenuLocation" data-bs-toggle="dropdown" aria-expanded="false">
                                Location
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLocation" id="location-dropdown">
                                <?php foreach($uniqueLocations as $loc): ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $loc; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-myself dropdown-toggle" type="button" id="dropdownMenuSource" data-bs-toggle="dropdown" aria-expanded="false">
                                Source
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSource" id="source-dropdown">
                                <?php foreach($uniqueSources as $src): ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $src; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-myself dropdown-toggle" type="button" id="dropdownMenuStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                Application Status
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuStatus" id="status-dropdown">
                                <?php foreach($uniqueStatuses as $stat): ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $stat; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-myself dropdown-toggle" type="button" id="dropdownMenuSubmittedBy" data-bs-toggle="dropdown" aria-expanded="false">
                                Submitted By
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSubmittedBy" id="submitted-by-dropdown">
                                <?php foreach($uniqueSubmittedBys as $sb): ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $sb; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-myself dropdown-toggle" type="button" id="dropdownMenuSubmittedOn" data-bs-toggle="dropdown" aria-expanded="false">
                                Submitted On
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSubmittedOn" id="submitted-on-dropdown">
                                <?php foreach($uniqueSubmittedOns as $so): ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $so; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </ul>