# MITTRUM<br />
## About
  This repository is a project submission for a web programming course.<br />
  The project is website that allows Mid Sweden University students to review study-rooms, and view reviews left by fellow peers.<br />
  The project was created in vanilla code with HTML, CSS, JavaScript and PHP.
## Functionality
  **Account system**<br />
    Using the right mouse click the user can flag a board tile as a potential bomb,<br />
    this will be indicated with a flagged symbol and render the tile unflippable until it is unflagged.<br />
    The amount of available flags is shown above the board, the amount of total flags is equal to that of the amount of mines for the current mode.<br />
  **Visually Impaired Accessibility Toggle**<br />
    Left clicking an unflagged and unflipped tile will flip it. <br />
    If the tile is valueless, that is a tile with no surrounding bombs, the flipping will cascade and flip surrouding tiles until a numbered tile is flipped.<br />
**Sound**<br />
  Each round is accompanied with a background soundtrack, a victory sound-affect upon victory and defeat sound-affect upon defeat. <br />
**Timer**<br />
  Each round has a timer to indicate how long the round has been active, the timer stops updating at victory or defeat.<br />
**Defeat**<br />
  Detonating the bomb will lead to a defeat and unflips all tiles.<br />
**Victory**<br />
  Flipping all non-bomb tiles will lead to a victory
## The 3 difficulty modes<br />
```
  Easy
    9x9 Board
    10 Mines & Flags
  Medium
    16x16 Board
    40 Mines & Flags
  Hard
    24x24 Board
    99 Mines & Flags
```
## Gameplay of all game states
### Ongoing
<img width="1094" alt="Screenshot 2022-02-03 at 09 31 18" src="https://user-images.githubusercontent.com/74938876/152308577-e18cda55-d1ea-4f97-a68c-115bd6c79ab2.png"><br />
### Victorious 
<img width="1094" alt="Screenshot 2022-02-03 at 09 38 28" src="https://user-images.githubusercontent.com/74938876/152308554-7611a9c7-db78-4adf-a1c0-c32c69fb3636.png"><br />
### Defeated
<img width="1095" alt="Screenshot 2022-02-03 at 09 25 34" src="https://user-images.githubusercontent.com/74938876/152308588-cacd13b9-7d8b-487c-8f7c-f726357a4ff4.png">
