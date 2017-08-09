import {sum} from '../module.example';
import {minus} from '../module.example';
test('adds 1 + 2 to equal 3', () => {
    expect(sum(1, 2)).toBe(3);
});
test('subtracts 2 - 1 to equal 1', () => {
    expect(minus(2, 1)).toBe(1);
});