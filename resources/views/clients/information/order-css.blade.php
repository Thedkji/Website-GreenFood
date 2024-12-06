<style>
     .rating-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        font-size: 2rem;
        cursor: pointer;
    }

    .star {
        color: gray;
        transition: color 0.2s;
    }

    .star.hovered,
    .star.selected {
        color: gold;
    }
</style>