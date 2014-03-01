<?php
    function creatureMove( $creature ) {
        $offsets = [
            DIRECTION_NORTH => [ 0, 1 ],
            DIRECTION_EAST => [ 1, 0 ],
            DIRECTION_SOUTH => [ 0, -1 ],
            DIRECTION_WEST => [ -1, 0 ]
        ];
        $delta = $offsets[ $creature->intent->direction ];
        $x = $creature->locationx + $delta[ 0 ];
        $y = $creature->locationy + $delta[ 1 ];
        if ( $x < 0 || $x >= $creature->game->width || $y < 0 || $y >= $creature->game->height ) {
            throw new CreatureOutOfBoundsException( $creature );
        }
        $creature->locationx = $x;
        $creature->locationy = $y;
    }

    function findCreatureByCoordinates( $round, $x, $y ) {
        foreach ( $round->creatures as $possibleCreature ) {
            if ( $possibleCreature->alive ) {
                if ( $possibleCreature->locationx === $x && $possibleCreature->locationy === $y ) {
                    return $possibleCreature;
                }
            }
        }
        throw new ModelNotFoundException();
    }
    function creatureAttack( $attackerCreature ) {
        $potentialVictim = clone $attackerCreature;
        try {
            creatureMove( $potentialVictim );
        }
        catch ( CreatureOutOfBoundsException $e ) {
            $attackerCreature->game->killBot(
                $attackerCreature->user,
                "Tried to attack a creature outside of bounds with creature $attackerCreature->id."
            );
            return;
        }
        $victim = $potentialVictim;
        try {
            $victim = findCreatureByCoordinates( $attackerCreature->round, $victim->locationx, $victim->locationy );
        }
        catch ( ModelNotFoundException $e ) {
            $attackerCreature->intent = new Intent();
            $attackerCreature->game->killBot(
                $attackerCreature->user,
                "Tried to attack non existent creature with creature $attackerCreature->id."
            );
            return;
        }
        if ( $victim->user->id === $attackerCreature->user->id ) {
            $attackerCreature->game->killBot(
                $attackerCreature->user,
                "Tried to attack creature $victim->id with creature $attackerCreature->id while they both belong to the same user."
            );
            return;
        }
        --$victim->hp;
    }
?>
