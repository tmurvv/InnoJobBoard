<select name="category" class="search__form--selectBoxes-item" id="">

    <?php while($row = $categories->fetch_assoc()) : ?>
    <option value="<?php echo $row['name']; ?>" <?php echo $selected; ?>>
        <?php echo $row['name']; ?>
    </option>
    <?php endwhile; ?>

</select>
<select name="jobtype" class="search__form--selectBoxes-item" id="">
    <?php while($row = $jobtypes->fetch_assoc()) : ?>
    <option value="<?php echo $row['name']; ?>" <?php echo $selected; ?>>
        <?php echo $row['name']; ?>
    </option>
    <?php endwhile; ?>
</select>
<select name="location" class="search__form--selectBoxes-item" id="">
    <?php while($row = $locations->fetch_assoc()) : ?>
    <option value="<?php echo $row['location']; ?>" <?php echo $selected; ?>>
        <?php echo $row['location']; ?>
    </option>
    <?php endwhile; ?>
</select>